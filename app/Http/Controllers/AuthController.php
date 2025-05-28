<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.login');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check user type after login
            if (Auth::user()->user_type === 'Admin') {
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout(); // Logout non-admin user

                return redirect()->back()
                    ->withErrors(['email' => 'Access denied. Admins only.'])
                    ->withInput();
            }
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid email or password.'])
            ->withInput();
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
