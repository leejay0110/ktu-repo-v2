<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
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
        
        return view('dashboard.user.index', [
        ]);
    }

}