<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user-admin.dashboard', compact('user'));
    }
}
