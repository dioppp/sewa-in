<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venues')->insert([
            'user_id' => 1,
            'name' => 'GOR Aci Tri Dharm',
            'address' => 'Jl. Sunan Ampel No.214, Jrebeng Lor, Kec. Kedopok',
            'description' => 'Lapangan badminton indoor',
            'photo' => 'venues/' . fake()->image('public/storage/venues', 640, 480, null, false),
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('venues')->insert([
            'user_id' => 1,
            'name' => 'GOR A Yani',
            'address' => 'l. Dr.Sutomo No.60, Tisnonegaran, Kec. Kanigaran',
            'description' => 'Kompleks olahraga',
            'photo' => 'venues/' . fake()->image('public/storage/venues', 640, 480, null, false),
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('venues')->insert([
            'user_id' => 1,
            'name' => 'Lucky Stone Futsal',
            'address' => 'Jl. Basuki Rahmad No.1, Mangunharjo, Kec. Mayangan',
            'description' => 'Lapangan futsal indoor',
            'photo' => 'venues/' . fake()->image('public/storage/venues', 640, 480, null, false),
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
