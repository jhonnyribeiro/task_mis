<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


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

    public function userIndex()
    {
        $users = User::orderBy("id", 'desc')->paginate(10);
        $count = 1;

        return view('admin.manage.user.index', compact('users', 'count'));
    }

    public function userCreate()
    {
        $roles = Role::all();

        return view('admin.manage.user.create', compact('roles'));
    }

    public function userStore(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|email|unique:users',
        ]);

        if (!empty($request->password)) {
            $password = trim($request->password);
        } else {
            $password = 'password';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($password)
        ]);

        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('admin.user.index');
    }

    public function userShow($id)
    {
        $user = User::findOrFail($id);

        return view('admin.manage.user.show', compact('user'));
    }
}
