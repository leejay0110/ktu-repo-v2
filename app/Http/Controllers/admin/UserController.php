<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }


    public function index()
    {
        $users = User::where('admin', 0)->orderBy('active', 'desc')->orderBy('name')->get();

        return view('dashboard.admin.users.index', [
            'users' => $users
        ]);
    }

    function show(User $user)
    {

        $roles = Role::all();

        return view('dashboard.admin.users.show', [
            'user' => $user,
            'roles' => $roles
        ]);

    }


    function approve(User $user)
    {

        $user->approved = 1;
        $user->save();

        return redirect()->back()->with('success', 'Account approved successfully.');

    }



    function activate(User $user)
    {

        $user->active = 1;
        $user->save();

        return redirect()->back()->with('success', 'User activated successfully.');

    }

    function deactivate(User $user)
    {

        $user->active = 0;
        $user->save();

        return redirect()->back()->with('success', 'User deactived successfully.');

    }

    function resetPassword(User $user)
    {
        $user->password = Hash::make('pass1234');
        $user->save();
        return redirect()->back()->with('success', 'Password reset was successful');

    }
    
}