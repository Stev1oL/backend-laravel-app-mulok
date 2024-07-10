<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function createStudent(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nisn' => 'required|unique:students,nisn',
            'username' => 'required|unique:students,username',
            'password' => 'required',
            'id_semester' => 'required|exists:semesters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $student = Student::create([
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'username' => $request->username,
                'password' => $request->password,
                'id_semester' => $request->id_semester,
            ]);
            $student->makeHidden('password');

            return response()->json([
                'success' => true,
                'message' => 'Student created successfully',
                'data' => $student
            ], 201);
        }
    }

    public function getStudent($id)
    {
        $student = Student::with(['semester'])->findOrFail($id);
        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Student not found'
            ], 404);
        }
        $student->makeHidden('password');

        return response()->json([
            'status' => true,
            'data' => $student
        ], 200);
    }

    public function getAllStudent()
    {
        $student = Student::with(['semester'])->get();
        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Student not found'
            ], 404);
        }
        $student->makeHidden('password');

        return response()->json([
            'status' => true,
            'message' => 'All students',
            'data' => $student
        ], 200);
    }

    public function editStudent($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'string',
            'nisn' => 'unique:students,nisn',
            'username' => 'unique:students,username',
            'id_semester' => 'exists:semesters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $student = Student::findOrFail($id);
            if (!$student) {
                return response()->json([
                    'status' => false,
                    'message' => 'Student not found'
                ], 404);
            }

            $student->nama = $request['nama'];
            $student->nisn = $request['nisn'];
            $student->username = $request['username'];
            $student->id_semester = $request['id_semester'];

            $student->save();

            $student->makeHidden('password');

            return response()->json([
                'success' => true,
                'message' => 'Student updated successfully',
                'data' => $student
            ], 200);
        }
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Student not found'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'status' => true,
            'message' => 'Student deleted successfully'
        ], 200);
    }
}
