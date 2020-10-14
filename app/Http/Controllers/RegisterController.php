<?php

namespace App\Http\Controllers;

use App\Events\NewUserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }



    function index()
    {
        return view('pages.register');
    }



    function register(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:254'],
            'r_email' => ['required', 'email', 'unique:users,email', 'max:254'],
            'r_password' => ['required', 'min:6'],
            'role' => ['required']
        ], [
            'r_email.required' => 'The email field is required.',
            'r_email.email' => 'The email must be a valid email.',
            'r_email.unique' => 'The email has already been taken.',
            'r_email.max' => 'The email may not be greater than 254 characters.',

            'r_password.required' => 'The password field is required.',
            'r_password.min' => 'The password must be at least 6 characters.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        // set user roles through event & listener
        $role = $data['role'];
        event(new NewUserRegistered($user, $role));


        // notify admin for account activation
        // $admin = User::where('username', 'admin')->first();
        // $admin->notify(new UserRegistered($user));
        
        return redirect()->route('login')->with('success', 'Your account has been created but awaiting approval.');



    }
}
