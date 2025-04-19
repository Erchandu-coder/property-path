<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use Carbon\Carbon;


class UserController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user(); // Get the authenticated user
        $tpcount = [];
        $date = Carbon::now();   
        $today_date = Carbon::now()->toDateString(); // Just the date
        $yesterdayDate = Carbon::yesterday()->toDateString();
        $counts = [];
        $propertyTypes = [
            'rrent_count' => 1, // Residential Rent
            'rsell_count' => 2, // Residential Sell
            'crent_count' => 3, // Commercial Rent
            'csell_count' => 4, // Commercial Sell
        ];
        
        foreach ($propertyTypes as $key => $typeId) {
            $counts[$key] = Property::where('status', 1)
                                    ->where('property_type_id', $typeId)
                                    ->count();                    
        }
        
        $PropertyTypes = [
            'today_rrent_count' => 1, // Residential Rent
            'today_rsell_count' => 2, // Residential Sell
            'today_crent_count' => 3, // Commercial Rent
            'today_csell_count' => 4, // Commercial Sell
        ];

        foreach ($PropertyTypes as $pkey => $pId) {
            $tpcount[$pkey] = Property::where('status', 1)
                                      ->where('property_type_id', $pId)
                                      ->where('date', $today_date)
                                      ->count();
        }

        // $PropertyTypes = [
        //     'yesterday_rrent_count' => 1, // Residential Rent
        //     'yesterday_rsell_count' => 2, // Residential Sell
        //     'yesterday_crent_count' => 3, // Commercial Rent
        //     'yesterday_csell_count' => 4, // Commercial Sell
        // ];

        // foreach ($PropertyTypes as $ykey => $pId) {
        //     $tpcount[$pkey] = Property::where('status', 1)
        //                               ->where('property_type_id', $pId)
        //                               ->where('date', $yesterdayDate)
        //                               ->count();
        // }

        $tpcount['today_total_property'] = Property::where('status', 1)
                                                    ->where('date', $today_date)
                                                    ->count();
        // $yesterdayCount = Property::where('status', 1)
        //                         ->where('property_type_id', 1)
        //                         ->where('date', $yesterdayDate)
        //                         ->count();                        
        // dd($yesterdayCount);
        // dd($tpcount);


        $counts['total_property'] = Property::where('status', 1)->count();

        return view('user-admin.dashboard', array_merge(['user' => $user], $counts, $tpcount));
    }
}
