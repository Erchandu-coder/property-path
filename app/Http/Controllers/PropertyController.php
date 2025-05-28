<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\Subscription;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;



class PropertyController extends Controller
{
    public function showResidentialRent(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $now_date = Carbon::now()->toDateString();
        $p_status = Subscription::where('user_id', $user->id)->where('plan_expire_date', '>=', $now_date)->first();
        $cities = City::where('status', 1)->get();
        $cartPropertyIds = [];

        if ($user) {
            $cartPropertyIds = CartItem::where('user_id', $user->id)->pluck('property_id')->toArray();
        }

        $query = Property::with('city')
        ->where('property_type_id', 1)
        ->where('status', 1)
        ->where('go_live_at', '<=', now())
        ->orderBy('created_at', 'DESC');

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
        return view('user-admin.residential-rent', compact('user', 'items', 'cities', 'p_status', 'cartPropertyIds'));
    }

    public function showResidentialSell(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $now_date = Carbon::now()->toDateString();
        $p_status = Subscription::where('user_id', $user->id)->where('plan_expire_date', '>=', $now_date)->first();
        $cities = City::where('status', 1)->get();
        $cartPropertyIds = [];

        if ($user) {
            $cartPropertyIds = CartItem::where('user_id', $user->id)->pluck('property_id')->toArray();
        }

        $query = Property::with('city')
        ->where('property_type_id', 2)
        ->where('status', 1)
        ->where('go_live_at', '<=', now())
        ->orderBy('created_at', 'DESC');

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
        return view('user-admin.residential-sell', compact('user', 'items', 'cities', 'p_status', 'cartPropertyIds'));
    }

    public function showCommercialRent(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $now_date = Carbon::now()->toDateString();
        $p_status = Subscription::where('user_id', $user->id)->where('plan_expire_date', '>=', $now_date)->first();
        $cities = City::where('status', 1)->get();
        $cartPropertyIds = [];
        if ($user) {
            $cartPropertyIds = CartItem::where('user_id', $user->id)->pluck('property_id')->toArray();
        }

        $query = Property::with('city')
        ->where('property_type_id', 3)
        ->where('status', 1)
        ->where('go_live_at', '<=', now())
        ->orderBy('created_at', 'DESC');

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
        return view('user-admin.commercial-rent', compact('user', 'items', 'cities', 'p_status', 'cartPropertyIds'));
    }

    public function showCommercialSell(Request $request)
    {
        $city_ids = decrypt_id($request->input('city_id'));
        $user = Auth::user();
        $now_date = Carbon::now()->toDateString();
        $p_status = Subscription::where('user_id', $user->id)->where('plan_expire_date', '>=', $now_date)->first();
        $cities = City::where('status', 1)->get();
        $cartPropertyIds = [];
        if ($user) {
            $cartPropertyIds = CartItem::where('user_id', $user->id)->pluck('property_id')->toArray();
        }
        $query = Property::with('city')
        ->where('property_type_id', 4)
        ->where('status', 1)
        ->where('go_live_at', '<=', now())
        ->orderBy('created_at', 'DESC');

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
        return view('user-admin.commercial-sell', compact('user', 'items', 'cities', 'p_status', 'cartPropertyIds'));
    }
    public function totalProperty(Request $request)
    {
        $user = Auth::user();
        $now_date = Carbon::now()->toDateString();
        $p_status = Subscription::where('user_id', $user->id)->where('plan_expire_date', '>=', $now_date)->first();
        $ptypes = PropertyType::get();
        $cities = City::where('status', 1)->get();
        $cartPropertyIds = [];
        if ($user) {
            $cartPropertyIds = CartItem::where('user_id', $user->id)->pluck('property_id')->toArray();
        }
        $query = Property::with('city')
            ->where('status', 1)
            ->whereHas('city', function ($q) {
                $q->where('status', 1);
            })
            ->orderBy('created_at', 'DESC');
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
        return view('user-admin.total-property', compact('user', 'items', 'ptypes', 'cities', 'p_status','cartPropertyIds'));
    }
    public function addCart(Request $request)
    {
            $user = Auth::user();
            $propertyID = $request->input('property_id');
            $propertyId = decrypt_id($propertyID);
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            // Optional: check if already in cart
            $exists = CartItem::where('user_id', $user->id)
                    ->where('property_id', $propertyId)->exists();
            if ($exists) {
                return response()->json(['message' => 'Already iAdded', 
                    'status' => 'exists'], 200);
            }
            CartItem::create([
                'user_id' => $user->id,
                'property_id' => $propertyId,
            ]);
            return response()->json(['message' => 'Added to Favourite Property successfully', 'status' => 'added'], 201);
    }
    public function favouriteProperty()
    {
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        $items = CartItem::with('property.city','property.propertype')
                ->with('city') // not 'properties'
                ->where('user_id', $user->id)
                ->paginate(10);
                
        return view('user-admin.favourite-property', compact('user', 'items', 'p_status'));
    }
    public function removeCart(Request $request)
    {
        $user = Auth::user();
        $propertyId = decrypt_id($request->property_id);    
        $cartItem = CartItem::where('user_id', $user->id)
                            ->where('id', $propertyId)
                            ->delete();

        if ($cartItem) {
            return response()->json(['message' => 'Removed from Favourite Property successfully']);
        } else {
            return response()->json(['error' => 'Something went wrong!']);
        }        
    }

}
