<?php

namespace Database\Seeders;

use Database\Factories\VenueFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VenueFactory::new()->count(3)->create();
    }
}
