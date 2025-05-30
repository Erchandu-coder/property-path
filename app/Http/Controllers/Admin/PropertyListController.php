<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Carbon\Carbon;

class PropertyListController extends Controller
{
    public function propertyList()
    {
        $results = Property::with('city')->get();
        return view('admin.property-list', compact('results'));
    }
    public function create()
    {
        $data = State::where('status', 1)->get();
        $ptypes = PropertyType::get();
        return view('admin.add-property', compact(['data', 'ptypes']));
    }
    public function store(Request $request)
    {
        $request->validate([
            'owner_name' =>  'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'contact_number'    => 'required|numeric',
            'premise'           => 'required',
            'date'              => 'required|date',
            'rent'              => 'required|numeric',
            'availability'      => 'required',
            'condition'         => 'required',
            // 'sqFt_sqyd'         => 'required',
            'key'               => 'required',
            'brokerage'         => 'required',
            'property_status'   => 'required',
            'address'           => 'required',
            'state_id'          => 'required|exists:states,id',
            'city_id'           => 'required|exists:cities,id',
            'description_1'     => 'required',
            'description_2'     => 'required',
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
            'key.required'               => 'Key information is required.',
            'brokerage.required'         => 'Brokerage is required.',
            'property_status.required'   => 'Property status is required.',
            'address.required'           => 'Address is required.',
        
            'state_id.required'          => 'State is required.',
            'state_id.exists'            => 'Selected state is invalid.',
        
            'city_id.required'           => 'City is required.',
            'city_id.exists'             => 'Selected city is invalid.',
        
            'description_1.required'     => 'Description 1 is required.',
            'description_2.required'     => 'Description 2 is required.',
        
            'property_type_id.required'  => 'Property type is required.',
            'property_type_id.exists'    => 'Selected property type is invalid.',
        ]);
        $data = Property::create([
            'owner_name' => $request->owner_name,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'premise' => $request->premise,
            'rent' => $request->rent,
            'availability' => $request->availability,
            'condition' => $request->condition,
            'sqFt_sqyd' => $request->sqFt_sqyd,
            'key' => $request->key,
            'brokerage' => $request->brokerage,
            'property_status' => $request->property_status,
            'description_1' => $request->description_1,
            'description_2' => $request->description_2,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'property_type_id' => $request->property_type_id,
            'date' => $request->date,
            'go_live_at' => Carbon::tomorrow()->toDateString(),
        ]);
        // dd($data);
        if ($data) {
            return redirect()->back()->with('message', 'Record added successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }        
    }
    public function editProperty($id)
    {
        $data = State::where('status', 1)->get();
        $ptypes = PropertyType::get();
        $property = Property::with(['state', 'city', 'propertype'])->find($id);
        return view('admin.edit-property', compact(['property', 'data', 'ptypes']));
    }

    public function updateProperty(Request $request)
    {
        $request->validate([
            'owner_name' =>  'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'contact_number'    => 'required|numeric',
            'premise'           => 'required',
            'date'              => 'required|date',
            'rent'              => 'required|numeric',
            'availability'      => 'required',
            'condition'         => 'required',
            // 'sqFt_sqyd'         => 'required',
            'key'               => 'required',
            'brokerage'         => 'required',
            'property_status'   => 'required',
            'address'           => 'required',
            'state_id'          => 'required|exists:states,id',
            'city_id'           => 'required|exists:cities,id',
            'description_1'     => 'required',
            'description_2'     => 'required',
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
            'key.required'               => 'Key information is required.',
            'brokerage.required'         => 'Brokerage is required.',
            'property_status.required'   => 'Property status is required.',
            'address.required'           => 'Address is required.',
        
            'state_id.required'          => 'State is required.',
            'state_id.exists'            => 'Selected state is invalid.',
        
            'city_id.required'           => 'City is required.',
            'city_id.exists'             => 'Selected city is invalid.',
        
            'description_1.required'     => 'Description 1 is required.',
            'description_2.required'     => 'Description 2 is required.',
        
            'property_type_id.required'  => 'Property type is required.',
            'property_type_id.exists'    => 'Selected property type is invalid.',
        ]);
                // Find the user by ID
                $pro = Property::findOrFail($request->id);

                // Update user data
                $pro->special_note = $request->special_note;
                $pro->date = $request->date;
                $pro->owner_name = $request->owner_name;
                $pro->contact_number = $request->contact_number;
                $pro->address = $request->address;
                $pro->premise = $request->premise;
                $pro->rent = $request->rent;
                $pro->availability = $request->availability;
                $pro->condition = $request->condition;
                $pro->sqFt_sqyd = $request->sqFt_sqyd;
                $pro->key = $request->key;
                $pro->brokerage = $request->brokerage;
                $pro->property_status = $request->property_status;
                $pro->description_1 = $request->description_1;
                $pro->description_2 = $request->description_2;
                $pro->state_id = $request->state_id;
                $pro->city_id = $request->city_id;
                $pro->property_type_id = $request->property_type_id;
        
                // Save changes
                $data = $pro->save();
                if ($data) {
                    return redirect()->back()->with('message', 'Property updated successfully!');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong!');
                }       
    }

    public function deleteProperty($id)
    {
        $pro = Property::findOrFail($id);
        $data = $pro->delete();
        if ($data) {
            return redirect()->back()->with('message', 'Property deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }  
    }
}