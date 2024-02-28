<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_p(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        };

        return back()->with('error', 'Email or password incorrect!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_p(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Register success');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You has been logout');
    }
}
