<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class MaharashtraCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Thane', 'Aurangabad', 'Solapur',
            'Amravati', 'Kolhapur', 'Nanded', 'Sangli', 'Jalgaon', 'Akola', 'Latur',
            'Ahmednagar', 'Dhule', 'Chandrapur', 'Parbhani', 'Ichalkaranji', 'Jalna',
            'Bhusawal', 'Panvel', 'Beed', 'Yavatmal', 'Satara', 'Karad', 'Osmanabad',
            'Wardha', 'Ratnagiri', 'Gondia', 'Hingoli', 'Washim', 'Gadchiroli', 'Bhandara',
            'Baramati', 'Palghar', 'Nandurbar', 'Vasai-Virar'
        ];

        foreach ($cities as $city) {
            City::create([
                'state_id' => 1, // ✅ Update this to match Maharashtra's ID in your 'states' table
                'city_name' => $city,
                'status' => 1,
            ]);
        }
    }
}
