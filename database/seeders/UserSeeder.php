<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        for ($i = 1; $i <= 20; $i++) {
            $users[] = [
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@mailinator.com',
                'gender' => null,
                'dob' => null,
                'mobile' => '78945612' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'address' => null,
                'state' => null,
                'pincode' => null,
                'city' => null,
                'country' => null,
                'status' => 1,
                'email_verified_at' => null,
                'password' => Hash::make('Chandra@#1230321'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);

    }
}
