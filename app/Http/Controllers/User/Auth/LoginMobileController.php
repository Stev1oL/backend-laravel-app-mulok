<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginMobileController extends Controller
{
    public function loginMobile(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'username' => 'required',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = Student::where('username', $request->username)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username not found.',
                ], 401);
            }

            if ($request->password !== $user->password) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect password.',
                ], 401);
            }

            $user->makeHidden('password');

            return response()->json([
                'success' => true,
                'message' => 'User Logged In Successfully',
                'data' => $user,
                'token' => $user->createToken("token-api")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
