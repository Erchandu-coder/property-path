<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\District;

class PropertyListController extends Controller
{
    public function propertyList()
    {
        return view('admin.property-list');
    }
    public function create()
    {
        $data = State::where('status', 1)->get();
        return view('admin.add-property', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    }
}
