<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\PropertyType;
use App\Models\Property;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $states = State::where('status', 1)->get();
        $ptypes = PropertyType::get();
        return view('index', compact(['states', 'ptypes']));
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where('state_id', decrypt_id($request->state_id))
                    ->where('status', 1)
                    ->get(['city_name', 'id']);
                    return response()->json($data);            
    }
    public function guestAddProperty(Request $request)
    {
        try {
            $property_type_id = decrypt_id($request->property_type_id);
            $state_id = decrypt_id($request->state_id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid ID(s) provided.');
        }
        $request->merge([
            'property_type_id' => $property_type_id,
            'state_id' => $state_id,
        ]);
            $request->validate([
            'owner_name' =>  'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'contact_number'    => 'required|numeric',
            'premise'           => 'required',
            'date'              => 'required|date',
            'rent'              => 'required|numeric',
            'availability'      => 'required',
            'condition'         => 'required',
            // 'sqFt_sqyd'         => 'required',
            'brokerage'         => 'required',
            'address'           => 'required',
            'state_id'          => 'required|exists:states,id',
            'city_id'           => 'required|exists:cities,id',
            'property_type_id'  => 'required|exists:property_types,id',
        ], [
            'owner_name.required'        => 'Owner name is required.',
            'owner_name.regex'    => 'Owner name may only contain letters and spaces.',
            'owner_name.max'             => 'Owner name may not be greater than 255 characters.',
        
            'contact_number.required'    => 'Contact number is required.',
            'contact_number.numeric'     => 'Contact number must be numeric.',
        
            'premise.required'           => 'Premise is required.',
            'date.required'              => 'Date is required.',
            'date.date'                  => 'Date must be a valid date format.',
        
            'rent.required'              => 'Rent is required.',
            'rent.numeric'               => 'Rent must be a number.',
        
            'availability.required'      => 'Availability is required.',
            'condition.required'         => 'Condition is required.',
            // 'sqFt_sqyd.required'         => 'Sq. Ft./Sq. Yd. is required.',
            'brokerage.required'         => 'Brokerage is required.',
            'address.required'           => 'Address is required.',
        
            'state_id.required'          => 'State is required.',
            'state_id.exists'            => 'Selected state is invalid.',
        
            'city_id.required'           => 'City is required.',
            'city_id.exists'             => 'Selected city is invalid.',
        
            'property_type_id.required'  => 'Property type is required.',
            'property_type_id.exists'    => 'Selected property type is invalid.',
        ]);
        $data = Property::create([
            'owner_name' => $request->owner_name,
            'contact_number' => $request->contact_number,
            'date' => $request->date,
            'brokerage' => $request->brokerage,
            'premise' => $request->premise,
            'property_type_id' => $property_type_id,
            'rent' => $request->rent,
            'availability' => $request->availability,
            'condition' => $request->condition,
            'sqFt_sqyd' => $request->sqFt_sqyd,
            'state_id' => $state_id,
            'city_id' => $request->city_id,
            'address' => $request->address,           
            'property_status' => 'Available',    
            'go_live_at' => Carbon::tomorrow(),
        ]);
        // dd($data);
        if ($data) {
            return redirect()->back()->with('message', 'Record added successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    
}
