<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyListController extends Controller
{
    public function propertyList()
    {
        return view('admin.property-list');
    }
    public function create()
    {
        return view('admin.add-property');
    }
}
