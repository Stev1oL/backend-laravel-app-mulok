<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminDetailController extends Controller
{
    public function getUser()
    {
        $user = Auth::user();
        return response()->json([
            'id' => $user->id,
            'nama' => $user->nama,
            'username' => $user->username,
            'password' => $user->password
        ]);
    }

    public function editUser(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama' => 'string',
            'username' => 'string|unique:users,username',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors(),
            ], 500);
        } else {
            $user = User::findOrFail(Auth::user()->id);

            $user->nama = $request['nama'];
            $user->username = $request['username'];

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ], 200);
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors(),
            ], 500);
        } else {
            $user = User::findOrFail(Auth::user()->id);

            $user->password = Hash::make($request->password);

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Change password successfully',
                'data' => $user
            ], 200);
        }
    }
}
