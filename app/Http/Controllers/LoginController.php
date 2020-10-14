<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }



    function show()
    {
        return view('pages.login');
    }



    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:254',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->isAdmin()){
                return redirect()->route('admin');
            }
            return redirect()->route('user');

        }

        return redirect()->back()->with('error', 'Invalid credentials.');

    }




    function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
