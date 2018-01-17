<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashbroad.index');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('login');
        }
    }
}
