<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('auth/Login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            Session::regenerate();

            return to_route('home');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function register()
    {
        return Inertia::render('auth/Register');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);

        return to_route('home');
    }

    public function logout()
    {
        Auth::logout();
        Session::regenerate();

        return redirect('auth/login');
    }
}
