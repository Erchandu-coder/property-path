<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyType;

class PropertyListController extends Controller
{
    public function propertyList()
    {
        return view('admin.property-list');
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
            'district_id'       => 'required|exists:districts,id',
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
        
            'district_id.required'       => 'District is required.',
            'district_id.exists'         => 'Selected district is invalid.',
        
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
            'district_id' => $request->district_id,
            'property_type_id ' => $request->property_type_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);
        if ($data) {
            return response()->json([
                'message' => 'Record added successfully!',
                'status'  => true
            ], 200);
        } else {
            return response()->json([
                'message' => 'Something went wrong!',
                'status'  => false
            ], 500);
        }
    }
}