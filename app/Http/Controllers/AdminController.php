<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdminDashboard ()
    {
        return view('admin.adminDashboard');
    }

    public function registerView()
    {
        return view ('admin.registerStudent');

    }
}


