<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function add(User $user, Role $role)
    {
        $user->roles()->attach($role->id);
        return redirect()->back()->with('success', 'Role added successfully');
    }

    public function destroy(User $user, Role $role)
    {
        $user->roles()->detach($role->id);
        return redirect()->back()->with('success', 'Role deleted successfully');
    }

}
