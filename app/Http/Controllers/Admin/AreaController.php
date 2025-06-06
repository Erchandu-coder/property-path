<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;



class AreaController extends Controller
{
    public function createState()
    {
        $result = State::paginate(10);
        return view('admin.states', compact('result'));
    }

    // public function storStates(Request $request)
    // {
    //     $request->validate([
    //         'state_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
    //     ]);
    //     $state_name = filter_var($request->state_name, FILTER_SANITIZE_STRING);
    //     try {
    //         $data = new State;
    //         $data->state_name = $state_name;
    //         $data->save();
    //         return redirect()->back()->with('success', 'State added successfully!');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    //     }
    //     // dd($request->all());
    // }
    public function updateStateStatus(Request $request)
    {
        $item = State::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();

            return response()->json(['message' => 'Status updated successfully.']);
        }

        return response()->json(['message' => 'Item not found.'], 404);
    }
/////////////////////////////////////////////////////////////////////////////////////////
    public function createCity()
    {
        $items = State::where('status', 1)->get(); 
        $cities = City::all();      
        return view('admin.cities', compact(['items', 'cities']));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where('state_id', $request->state_id)
                    ->where('status', 1)
                    ->get(['city_name', 'id']);
                    return response()->json($data);            
    }

    public function updateCityStatus(Request $request)
    {
        $item = City::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();

            return response()->json(['message' => 'Status updated successfully.']);
        }

        return response()->json(['message' => 'Item not found.'], 404);
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'city_name' => 'required|string|max:255|unique:cities',
            'status' => 'required|in:0,1',
        ], [
            'state_id.required' => 'Please select a state.',
            'state_id.exists'   => 'The selected state is invalid.',
            
            'city_name.required' => 'City name is required.',
            'city_name.string'   => 'City name must be a string.',
            'city_name.max'      => 'City name may not be greater than 255 characters.',
            
            'status.required' => 'Please select a status.',
            'status.in'       => 'Status must be either Active or Deactive.',
        ]);
        City::create([
            'state_id' => $request->state_id,
            'city_name' => $request->city_name,
            'status' => $request->status,
        ]);
    
        return response()->json(['message' => 'City added successfully!']);
    }
}
