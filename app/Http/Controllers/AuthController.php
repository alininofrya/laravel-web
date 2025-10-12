<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' 
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.',
        ]);

        
        $username = $request->input('username');
        $password = $request->input('password');

        
        if ($username === $password) {
            
            session(['username' => $username]);

            
            return redirect('/home')->with('success', 'Selamat datang, ' . $username . '!');
        }


        return back()->withErrors(['login' => 'Username dan password tidak cocok.'])->withInput();
    }
}