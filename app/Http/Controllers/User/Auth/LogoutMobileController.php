<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutMobileController extends Controller
{
    public function logoutUserMobile(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    }
}
