<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $cradintials = $request->except('_token');
        $token = auth('api')->attempt($cradintials);
        if (!$token) {
            return response()->json(['error'=>'Incorrect Email or pass...!',401]);
        }
        return response()->json([
            'token' => $token,
            'message' => 'login successfully...',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Good bye'
        ]);
    }
}
