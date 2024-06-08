<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginUser(Request $request)
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

            if (!Auth::attempt($request->only(['username', 'password']))) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('username', $request->username)->first();
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
