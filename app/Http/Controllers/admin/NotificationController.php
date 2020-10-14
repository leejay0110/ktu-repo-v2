<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('dashboard.admin.notifications.index');
    }


    public function show()
    {
        return view('dashboard.admin.notifications.show');
    }
}
