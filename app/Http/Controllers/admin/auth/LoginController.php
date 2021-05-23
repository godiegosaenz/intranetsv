<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login()
    {
        $credenciales = request()->only('email','password');

        if(Auth::attempt($credenciales))
        {
            request()->session()->regenerate();
            return redirect('/admin/home');
        }

        return redirect('/');
    }
}
