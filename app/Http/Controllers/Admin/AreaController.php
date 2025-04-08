<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;


class AreaController extends Controller
{
    public function createStates()
    {
        $result = State::where('status', 1)->get();
        return view('admin.states', compact('result'));
    }

    public function storStates(Request $request)
    {
        $request->validate([
            'state_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
        ]);
        $state_name = filter_var($request->state_name, FILTER_SANITIZE_STRING);
        try {
            $data = new State;
            $data->state_name = $state_name;
            $data->save();
            return redirect()->back()->with('success', 'State added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
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
