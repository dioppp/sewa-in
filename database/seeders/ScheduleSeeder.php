<?php

namespace Database\Seeders;

use Database\Factories\ScheduleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 22; $i++) {
            DB::table('schedules')->insert([
                'start_time' => $i . ':00',
                'end_time' => $i+1 . ':00',
                'created_by' => 'Seeder',
                'updated_by' => 'Seeder',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('schedules')->insert([
            'start_time' => '23:00',
            'end_time' => '00:00',
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
