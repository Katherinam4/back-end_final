<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function register() {

        return view('auth.signup');

    }

    public function signin() {

        return view('auth.login');

    }

    public function registerHandling(Request $request) {
    $request->validate([
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::create([
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    auth()->login($user);

    return redirect()->route("quizzes.index");
    }

    public function signinHandling(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean',
        ]);


        $credentials = $request->only(['email', 'password']);
        $remember = $request->input('remember', false);

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('quizzes.index');
        }
        return back()->withErrors([
            'message' => 'The email or password is incorrect, please try again'
        ]);
    }
}

