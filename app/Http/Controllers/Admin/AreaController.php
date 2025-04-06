<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;


class AreaController extends Controller
{
    public function createStates()
    {
        return view('admin.states');
    }

    public function storStates(Request $request)
    {
        $str = $request->validate([
            'state_name' => 'required|max:255',
        ]);
        $state_name = filter_var($request->state_name, FILTER_SANITIZE_STRING);
        $data = new State;
        $data->state_name = $state_name;
        $data->save();
        // dd($request->all());
    }
    public function createcities()
    {
        return view('admin.cities');
    }

    public function createdistrict()
    {
        return view('admin.district');
    }
}
