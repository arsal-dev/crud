<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login_post(Request $request)
    {
        if ($request->input('check')) {
            $remember = true;
        } else {
            $remember = false;
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $result = Auth()->attempt($credentials, $remember);

        if ($result) {
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('login', "Credentials Don't Match");
        }
    }

    public function logout()
    {
        Auth()->logout();

        return redirect('login');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $credentials = $request->only('email', 'password');

        $result = Auth()->attempt($credentials, true);

        if ($result) {
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('login', "Something Went Wrong");
        }
    }
}
