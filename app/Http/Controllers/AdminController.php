<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function managerUsers()
    {
        $users = User::orderBy("id", 'desc')->paginate(10);
        $count = 1;

        return view('admin.manage.user.index', compact('users', 'count'));
    }
}
