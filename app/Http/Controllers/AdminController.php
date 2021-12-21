<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('role:administrator');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
