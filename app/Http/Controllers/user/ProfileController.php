<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.approval');
        $this->middleware('check.active.status');
    }

    public function index()
    {
        return view('dashboard.user.profile');
    }


    function updateDetails(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
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



    function updateAvatar(Request $request)
    {

        $request->validate([
            'avatar' => 'file|image|required'
        ]);

        // delete old avatar
        if ( Auth::user()->avatar ) {
            Storage::delete(Auth::user()->avatar);
        }



        // upload new avatar
        $filename = Auth::user()->id . "." . $request->File('avatar')->getClientOriginalExtension();
        $path = $request->File('avatar')->storeAs("public/avatars", $filename);




        // resize new avatar
        $img = Image::make( public_path( "storage/avatars/$filename") )->fit(300, 300);
        $img->save();

        
        $user = Auth::user();
        $user->avatar = $path;
        $user->save();
        
        return redirect()->back()->with('success', 'Avatar updated successfully.');
        
    }

    function deleteAvatar()
    {
        Storage::delete(Auth::user()->avatar);
        
        $user = Auth::user();
        $user->avatar = null;
        $user->save();

        return redirect()->back()->with('success', 'Avatar deleted successfully.');
    }


}
