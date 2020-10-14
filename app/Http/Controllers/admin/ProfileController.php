<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('dashboard.admin.profile');
    }


    function updateDetails(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3'
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Update was successful.');
        
    }

    function updatePassword(Request $request)
    {
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        if(Hash::check($request->current_password, Auth::user()->password))
        {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Your password has been updated successfully.');
        }

        return redirect()->back()->with('error', 'The current password you provided is incorrect.');
    }
    
}
