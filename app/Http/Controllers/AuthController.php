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
        // Validasi
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // wajib ada huruf kapital
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.',
        ]);

        // Ambil input
        $username = $request->input('username');
        $password = $request->input('password');

        // Logika login sederhana
        if ($username === $password) {
            // Simpan session agar tahu user sudah login (opsional)
            session(['username' => $username]);

            // Redirect ke halaman home
            return redirect('/home')->with('success', 'Selamat datang, ' . $username . '!');
        }

        // Jika gagal login
        return back()->withErrors(['login' => 'Username dan password tidak cocok.'])->withInput();
    }
}
