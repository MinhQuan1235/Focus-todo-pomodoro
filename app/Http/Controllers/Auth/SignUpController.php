<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function index()
    {
        return view('sign-up');
    }

    public function store(StoreUserRequest $request, AuthService $authService)
    {
        // create user
        $user = $authService->register(
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
        );
        // add auth

        $credentials = [
            'email' => $user->email,
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return redirect()->back();
    }
}
