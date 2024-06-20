<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('fields')->insert([
                'venue_id' => $i,
                'sport_id' => $i,
                'name' => 'Field ' . $i,
                'is_indoor' => $i % 2 === 0,
                'material' => 'Vinyl',
                'photo' => 'field-' . $i . '.jpg',
                'created_by' => 'Seeder',
                'updated_by' => 'Seeder',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
