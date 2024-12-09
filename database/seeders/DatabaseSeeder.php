<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class, // Memanggil UserSeeder
            DetailUserSeeder::class, // Memanggil DetailUserSeeder
            JadwalSurveySeeder::class,
            PengajuanSeeder::class,
        ]);
    }
}
