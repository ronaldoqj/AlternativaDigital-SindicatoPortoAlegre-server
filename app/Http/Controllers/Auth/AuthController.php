<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = new User();
        $user = $user->all();
        // $user = $user->find($request->input('login'));

        return $user;
        // return 'oi';
    }
}
