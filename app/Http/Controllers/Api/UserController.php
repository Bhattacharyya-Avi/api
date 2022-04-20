<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userList()
    {
        try {
            $users = User::all();
            return response()->json(['users' => $users]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
                'message' => 'login first'
            ]);
        }
    }
}
