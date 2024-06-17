<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function index()
    {
        return view('sign-in');
    }

    public function authenticate(SignInRequest $request): RedirectResponse
    {
        $credentials = ([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {

        //        $request->validate([
        //            'email' => 'required|max:255|email',
        //            'password' => 'required',
        //        ]);
        //        $user = User::where('email',$request->input('email'))->first();
        //        if ($user == null) {
        //            return 'sai email';
        //        }
        //        $passwordCheck= Hash::check($request->input('password'),$user -> password );
        //        if ($passwordCheck == false) {
        //            return "sai pass";
        //        }

    }
}
