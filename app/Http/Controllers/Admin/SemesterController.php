<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SemesterController extends Controller
{
    public function createSemester(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'semester' => 'string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $semester = Semester::create([
                'semester' => $request->semester
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Semester created successfully',
                'semester' => $semester
            ], 201);
        }
    }

    public function getSemester($id)
    {
        $semester = Semester::findOrFail($id);
        if (!$semester) {
            return response()->json([
                'status' => false,
                'message' => 'Semester not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'semester' => $semester
        ], 200);
    }

    public function getAllSemester()
    {
        $semester = Semester::all();
        if (!$semester) {
            return response()->json([
                'status' => false,
                'message' => 'Semesters not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All semesters',
            'semester' => $semester
        ], 200);
    }

    public function editSemester($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'semester' => 'string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $semester = Semester::findOrFail($id);
            if (!$semester) {
                return response()->json([
                    'status' => false,
                    'message' => 'Semester not found'
                ], 404);
            }

            $semester->semester = $request['semester'];

            $semester->save();

            return response()->json([
                'success' => true,
                'message' => 'Semester updated successfully',
                'semester' => $semester
            ], 200);
        }
    }

    public function deleteSemester($id)
    {
        $semester = Semester::findOrFail($id);

        if (!$semester) {
            return response()->json([
                'status' => false,
                'message' => 'Semester not found'
            ], 404);
        }

        $semester->delete();

        return response()->json([
            'status' => true,
            'message' => 'Semester deleted successfully'
        ], 200);
    }
}
