<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [];

        $localities = [
            'Shivaji Nagar', 'Kothrud', 'Viman Nagar', 'Hinjewadi', 'Deccan',
            'Swargate', 'Koregaon Park', 'Aundh', 'Baner', 'Wakad',
            'Yerawada', 'Bibwewadi', 'Katraj', 'Dhanori', 'Camp',
            'Hadapsar', 'Magarpatta', 'Balewadi', 'Kharadi', 'NIBM Road'
        ];

            $cityIds = DB::table('cities')->pluck('id')->toArray();
            $propertyTypeIds = DB::table('property_types')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'special_note' => null,
                'date' => now()->subDays(rand(1, 10))->toDateString(),
                'owner_name' => 'Owner ' . $i,
                'contact_number' => '98765000' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => $localities[$i - 1] . ', Pune, Maharashtra, 4110' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'premise' => 'Flat ' . $i,
                'rent' => rand(10000, 25000),
                'availability' => [
                    "1 Room",
                    "1 Room & Kitchen",
                    "1.5BHK",
                    "1BHK",
                    "2 Room",
                    "2 Room & Kitchen",
                    "2.5BHK",
                    "2BHK",
                    "3BHK",
                    "4BHK",
                    "5BHK",
                    "6BHK",
                    "Above 2BHK",
                    "Duplex",
                    "Duplex 1",
                    "Independent Building",
                    "PG",
                ][rand(0, 16)],
                'condition' => ['Semi Furnished', 'Unfurnished', 'Furnished', 'Kitchen-Fix', 'Fully Furnished'][rand(0, 4)],
                'sqFt_sqyd' => rand(500, 1500) . ' sqft',
                'key' => 'KEY' . strtoupper(Str::random(5)),
                'brokerage' => 'No Brokerage',
                'property_status' => ['Available', 'Rent Out', 'Not Receiving', 'Incoming Call Stop', 'Switch Off'][rand(0, 4)],
                'description_1' => 'Spacious and well ventilated property',
                'description_2' => '2BHK semi-furnished',
                'state_id' => 1,
                'city_id' => $cityIds[array_rand($cityIds)],
                'property_type_id' => $propertyTypeIds[array_rand($propertyTypeIds)],
                'status' => 1,
                'go_live_at'=> collect([
                        Carbon::now(),
                        Carbon::yesterday(),
                        Carbon::tomorrow()
                    ])->random()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Then insert into the DB
        DB::table('properties')->insert($data);
        
    }
}
