<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function states()
    {
        return view('admin.states');
    }

    public function cities()
    {
        return view('admin.cities');
    }

    public function district()
    {
        return view('admin.district');
    }
}
