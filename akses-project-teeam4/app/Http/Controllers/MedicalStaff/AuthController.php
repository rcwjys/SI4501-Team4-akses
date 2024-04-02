<?php

namespace App\Http\Controllers\MedicalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        // todo
    }

    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|unique:users|',
            'user_phone' => 'required|unique:users|',
            'user_address' => 'required',
            'user_email' => 'required|unique:users',
            'use_password' => 'required|min:5',
            'role_id' => 'required',
            'institution_id' => 'required'
        ]);

        $       
        $user = new User;
        $user->save();
    }

    public function logout()
    {
        // todo
    }
}
