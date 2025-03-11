<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        if ($user) {
            Auth::login($user);
            return view('profile');
        }
        return view('register');
    }

    public function login(LoginRequest $request)
    {
        $user = auth()->attempt($request->validated());
        if ($user) {
            return redirect()->route('profile');
        }
        return view('register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
