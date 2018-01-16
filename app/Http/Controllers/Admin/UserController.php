<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getUser()
    {
        $users = User::all();
        return view('admin.pages.users.list')->with('users', $users);
    }
}
