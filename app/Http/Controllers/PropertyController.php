<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\Subscription;


class PropertyController extends Controller
{
    public function showResidentialRent(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $cities = City::where('status', 1)->get();
        $query = Property::with('city')
        ->where('property_type_id', 1)
        ->where('status', 1);

        if ($request->filled('yesterday')) {
        $query->whereDate('date', $request->yesterday);
        }

        if ($request->filled('today')) {
        $query->whereDate('date', $request->today);
        }
        
        if ($request->filled('premise')) {
        $query->where('premise', 'like', '%' . $request->premise . '%');
        }
        if ($request->filled('city_id')) {
            $query->whereHas('city', function($q) use ($city_ids) {
                $q->where('id', $city_ids);
            });
        }      
        if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
        }
        if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
        }
        $items = $query->paginate(10)->appends($request->all());
        return view('user-admin.residential-rent', compact('user', 'items', 'cities', 'p_status'));
    }

    public function showResidentialSell(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $cities = City::where('status', 1)->get();
        $query = Property::with('city')
        ->where('property_type_id', 2)
        ->where('status', 1);
        if ($request->filled('yesterday')) {
        $query->whereDate('date', $request->yesterday);
        }

        if ($request->filled('today')) {
        $query->whereDate('date', $request->today);
        }
        if ($request->filled('premise')) {
        $query->where('premise', 'like', '%' . $request->premise . '%');
        }
        if ($request->filled('city_id')) {
            $query->whereHas('city', function($q) use ($city_ids) {
                $q->where('id', $city_ids);
            });
        }      
        if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
        }
        if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
        }
        $items = $query->paginate(10)->appends($request->all());
        return view('user-admin.residential-sell', compact('user', 'items', 'cities', 'p_status'));
    }

    public function showCommercialRent(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $cities = City::where('status', 1)->get();
        $query = Property::with('city')
        ->where('property_type_id', 3)
        ->where('status', 1);
        // Apply filters if they exist
        if ($request->filled('yesterday')) {
        $query->whereDate('date', $request->yesterday);
        }

        if ($request->filled('today')) {
        $query->whereDate('date', $request->today);
        }
        
        if ($request->filled('premise')) {
        $query->where('premise', 'like', '%' . $request->premise . '%');
        }
        if ($request->filled('city_id')) {
            $query->whereHas('city', function($q) use ($city_ids) {
                $q->where('id', $city_ids);
            });
        }      
        if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
        }
        if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
        }
        $items = $query->paginate(10)->appends($request->all());
        return view('user-admin.commercial-rent', compact('user', 'items', 'cities', 'p_status'));
    }

    public function showCommercialSell(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $cities = City::where('status', 1)->get();
        $query = Property::with('city')
        ->where('property_type_id', 4)
        ->where('status', 1);
        // Apply filters if they exist
        if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
        }
        if ($request->filled('premise')) {
        $query->where('premise', 'like', '%' . $request->premise . '%');
        }
        if ($request->filled('city_id')) {
            $query->whereHas('city', function($q) use ($city_ids) {
                $q->where('id', $city_ids);
            });
        }      
        if ($request->filled('availability')) {
        $query->where('availability', $request->availability);
        }
        if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
        }
        $items = $query->paginate(10)->appends($request->all());
        return view('user-admin.commercial-sell', compact('user', 'items', 'cities', 'p_status'));
    }
    public function totalProperty(Request $request)
    {
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $ptypes = PropertyType::get();
        $cities = City::where('status', 1)->get();
        $query = Property::with('city')
            ->where('status', 1)
            ->whereHas('city', function ($q) {
                $q->where('status', 1);
            });
        // Apply filters if they exist
        if ($request->filled('property_type_id')) {
            $query->where('property_type_id', $request->property_type_id);
        }

        if ($request->filled('condition')) {
            $query->whereIn('condition', $request->condition);
        }

        if ($request->filled('city_id')) {
            $query->whereIn('city_id', $request->city_id);
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('user-admin.total-property', compact('user', 'items', 'ptypes', 'cities', 'p_status'));
    }
}
