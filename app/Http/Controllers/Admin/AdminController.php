<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function showUser()
    {
        $results = User::paginate(10);
        return view('admin.all-user-list', compact('results'));
    }
}
