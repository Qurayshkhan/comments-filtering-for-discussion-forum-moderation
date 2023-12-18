<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('userStatus');
    }

    public function dashboard()
    {
        if (auth()->user()->role == 'normal_user') {
            return view('dashboard');
        } else {
            return view('pages.admin.dashboard.dashboard');
        }
    }
}
