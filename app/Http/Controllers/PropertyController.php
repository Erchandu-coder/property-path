<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;

class PropertyController extends Controller
{
    public function showResidentialRent()
    {
        $user = Auth::user();
        $items = Property::with('city')
                        ->where('property_type_id', 1)
                        ->where('status', 1)
                        ->paginate(10);
        return view('user-admin.residential-rent', compact('user', 'items'));
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
