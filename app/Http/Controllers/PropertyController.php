<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\City;


class PropertyController extends Controller
{
    public function showResidentialRent(Request $request)
    {
        $user = Auth::user();
        $ptypes = PropertyType::get();
        $cities = City::where('status', 1)->get();
        // $items = Property::with('city')
        //                 ->where('property_type_id', 1)
        //                 ->where('status', 1)
        //                 ->paginate(10);

        $query = Property::with('city')
        ->where('property_type_id', 1)
        ->where('status', 1);

        // Apply filters if they exist
        if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
        }

        if ($request->filled('premise')) {
        $query->where('premise', 'like', '%' . $request->premise . '%');
        }

        if ($request->filled('area')) {
        // Assuming area is linked to city->city_name
        $query->whereHas('city', function($q) use ($request) {
        $q->where('city_name', 'like', '%' . $request->area . '%');
        });
        }

        if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
        }

        if ($request->filled('condition')) {
        $query->where('condition', 'like', '%' . $request->condition . '%');
        }

        $items = $query->paginate(10)->appends($request->all());

        return view('user-admin.residential-rent', compact('user', 'items', 'ptypes', 'cities'));
    }

    public function showResidentialSell()
    {
        $user = Auth::user();
        $items = Property::with('city')
                        ->where('property_type_id', 2)
                        ->where('status', 1)
                        ->paginate(10);
        return view('user-admin.residential-sell', compact('user', 'items'));
    }

    public function showCommercialRent()
    {
        $user = Auth::user();
        $items = Property::with('city')
                        ->where('property_type_id', 3)
                        ->where('status', 1)
                        ->paginate(10);
        return view('user-admin.commercial-rent', compact('user', 'items'));
    }

    public function showCommercialSell()
    {
        $user = Auth::user();
        $items = Property::with('city')
                        ->where('property_type_id', 4)
                        ->where('status', 1)
                        ->paginate(10);
        return view('user-admin.commercial-sell', compact('user', 'items'));
    }
    public function totalProperty()
    {
        $user = Auth::user();
        $items = Property::with('city')
                        ->where('status', 1)
                        ->paginate(10);
        return view('user-admin.total-property', compact('user', 'items'));
    }
}
