<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required'
        ]);

        //$credenciales = request()->only('email','password');

        $remember = $request->filled('remember');

        if(Auth::attempt($credenciales, $remember))
        {
            $request->session()->regenerate();
            return redirect()->intended('admin/home');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
            'password' => __('auth.failed'),
        ]);


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

}
