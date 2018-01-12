<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login.login');
    }

    public function getRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login.register');
    }
}
