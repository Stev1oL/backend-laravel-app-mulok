<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDetailController extends Controller
{
    public function getUserMobile()
    {
        $user = Auth::user();
        $user = Student::with('semester')->find($user->id);

        return response()->json([
            'id' => $user->id,
            'nama' => $user->nama,
            'username' => $user->username,
            'password' => $user->password,
            'semester' => $user->semester
        ]);
    }

    public function editUserMobile(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'string',
            'username' => 'string|unique:students,username',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors(),
            ], 500);
        } else {
            $user = Student::findOrFail(Auth::user()->id);

            $user->nama = $request['nama'];
            $user->username = $request['username'];

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'student' => $user
            ], 200);
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'password' => 'string|confirmed',
            'password_confirmation' => 'string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors(),
            ], 500);
        } else {
            $student = Student::findOrFail(Auth::user()->id);
            if (!$student) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404);
            }

            $student->password = $request->password;
            $student->save();

            return response()->json([
                'success' => true,
                'message' => 'Change password successfully',
                'student' => $student
            ], 200);
        }
    }
}
