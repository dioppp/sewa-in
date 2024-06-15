<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Supardi Bengkel',
            'email' => 'admin@diop.web.id',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'address' => 'Jl. Apa Kek',
            'birthdate' => '1990-09-09',
            'phone' => '081234567890',
            'role' => 'admin',
            'created_by' => 'Seeder',
            'updated_by' => 'Seeder',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(10)->create();

        $this->call([
            SportSeeder::class,
            VenueSeeder::class,
            FieldSeeder::class,
            ScheduleSeeder::class,
            OrderSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
