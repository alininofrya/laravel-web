<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Cek user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data user ke session
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email
            ]);

            // Arahkan ke dashboard
            return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Jika login gagal
        return back()->withErrors(['login' => 'Email atau password salah.'])->withInput();
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
