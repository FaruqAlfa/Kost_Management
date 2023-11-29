<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginLogoutController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            $user = Auth::user();

            if ($user->role == 'admin') {
                // return redirect()->route('admin.dashboard');
                return view('admin.dashboardAdmin');
            } elseif ($user->role == 'user') {
                // return redirect()->route('user.dashboard');
                return view('anakKos.dashboardAnakKos');
            }
        }

        // Login gagal
        return redirect()->route('login')->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
