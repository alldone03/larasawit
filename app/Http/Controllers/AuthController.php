<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    function login(): View
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('Pages.Auth.login');
    }
    function register(): View
    {
        return view('Pages.Auth.register');
    }
    function onlogin()

    {
        $validate = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]

        );
        if (Auth::attempt($validate)) {
            request()->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }
    }
    function onregister()
    {
        $validate = request()->validate(
            [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
            ]
        );

        $validate['role'] = 2;
        $validate['password'] = bcrypt($validate['password']);
        // dd($validate);
        $data = User::create($validate);
        $data->save();
        return redirect()->route('login')->with('success', 'Registrasi Berhasil');
    }
    function onlogout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
