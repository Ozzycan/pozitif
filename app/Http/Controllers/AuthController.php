<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/profil');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_field' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = $credentials['login_field'];
        $password = $credentials['password'];

        $loginType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginType => $loginField, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended('/profil');
        }

        return back()->withErrors([
            'login_field' => 'Girdiğiniz bilgiler eşleşmiyor.',
        ])->onlyInput('login_field');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/profil');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|min:3|max:50|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect('/profil')->with('success', 'Kayıt işleminiz başarıyla tamamlandı!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
