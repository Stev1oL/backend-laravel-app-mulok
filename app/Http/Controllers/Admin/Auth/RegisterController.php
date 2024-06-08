<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'username' => 'required|unique:users,username',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("token-api")->plainTextToken
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
