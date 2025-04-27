<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user();
        $today = Carbon::today()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();
    
        $propertyTypeMapping = [
            1 => 'rrent', // Residential Rent
            2 => 'rsell', // Residential Sell
            3 => 'crent', // Commercial Rent
            4 => 'csell', // Commercial Sell
        ];
    
        $counts = [];
        $todayCounts = [];
        $yesterdayCounts = [];
    
        foreach ($propertyTypeMapping as $typeId => $label) {
            // Total by type
            $counts["{$label}_count"] = Property::where('status', 1)
                ->where('property_type_id', $typeId)
                ->count();
    
            // Today's count by type
            $todayCounts["today_{$label}_count"] = Property::where('status', 1)
                ->where('property_type_id', $typeId)
                ->whereDate('date', $today)
                ->count();
    
            // Yesterday's count by type
            $yesterdayCounts["yesterday_{$label}_count"] = Property::where('status', 1)
                ->where('property_type_id', $typeId)
                ->whereDate('date', $yesterday)
                ->count();
        }
    
        // Total counts
        $counts['total_property'] = Property::where('status', 1)->count();
        $todayCounts['today_total_property'] = Property::where('status', 1)
            ->whereDate('date', $today)
            ->count();
        $yesterdayCounts['yesterday_total_property'] = Property::where('status', 1)
            ->whereDate('date', $yesterday)
            ->count();
    
        $rrent_top = DB::table('cities as city')
                    ->leftJoin('properties as property', 'city.id', '=', 'property.city_id')
                    ->select('city.city_name', DB::raw('COUNT(property.id) as total_properties'), )
                    ->where('property.property_type_id', 1)
                    ->where('city.status', 1)
                    ->groupBy('property.city_id','city.city_name')
                    ->orderByDesc('total_properties')
                    ->limit(7)
                    ->get();

        $rsell_top = DB::table('cities as city')
                    ->leftJoin('properties as property', 'city.id', '=', 'property.city_id')
                    ->select('city.city_name', DB::raw('COUNT(property.id) as total_properties'), )
                    ->where('property.property_type_id', 2)
                    ->where('city.status', 1)
                    ->groupBy('property.city_id','city.city_name')
                    ->orderByDesc('total_properties')
                    ->limit(7)
                    ->get();    

        $crent_top = DB::table('cities as city')
                    ->leftJoin('properties as property', 'city.id', '=', 'property.city_id')
                    ->select('city.city_name', DB::raw('COUNT(property.id) as total_properties'), )
                    ->where('property.property_type_id', 3)
                    ->where('city.status', 1)
                    ->groupBy('property.city_id','city.city_name')
                    ->orderByDesc('total_properties')
                    ->limit(5)
                    ->get();  
                    
        $csell_top = DB::table('cities as city')
                    ->leftJoin('properties as property', 'city.id', '=', 'property.city_id')
                    ->select('city.city_name', DB::raw('COUNT(property.id) as total_properties'), )
                    ->where('property.property_type_id', 4)
                    ->where('city.status', 1)
                    ->groupBy('property.city_id','city.city_name')
                    ->orderByDesc('total_properties')
                    ->limit(5)
                    ->get();              
    
        return view('user-admin.dashboard', array_merge(
            ['user' => $user],
            $counts,
            $todayCounts,
            $yesterdayCounts,
            ['rrent_tops' => $rrent_top],
            ['rsell_tops' => $rsell_top], 
            ['crent_tops'=>$crent_top], 
            ['csell_tops'=>$csell_top]
        ));
    }
}
