<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        
        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'special_note' => null,
                'date' => now()->subDays(rand(1, 10))->toDateString(),
                'owner_name' => 'Owner ' . $i,
                'contact_number' => '98765000' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => $localities[$i - 1] . ', Pune, Maharashtra, 4110' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'premise' => 'Flat ' . $i,
                'rent' => rand(10000, 25000),
                'availability' => 'Available',
                'condition' => ['Semi Furnished', 'Unfurnished', 'Furnished', 'Kitchen-Fix'][rand(0, 3)],
                'sqFt_sqyd' => rand(500, 1500) . ' sqft',
                'key' => 'KEY' . strtoupper(Str::random(5)),
                'brokerage' => ['2%', '1%', 'No Brokerage'][rand(0, 2)],
                'property_status' => ['Available', 'Rent Out', 'Not Receiving', 'Incoming Call Stop', 'Switch Off'][rand(0, 4)],
                'description_1' => 'Spacious and well ventilated property',
                'description_2' => '2BHK semi-furnished',
                'state_id' => 1,
                'city_id' => rand(1, 37),
                'property_type_id' => rand(1, 4),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Then insert into the DB
        DB::table('properties')->insert($data);
        
    }
}
