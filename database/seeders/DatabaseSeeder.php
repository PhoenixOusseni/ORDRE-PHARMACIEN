<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Roleseeder::class,
            Sectionseeder::class,
            // RegionOrdinalSeeder::class,
            // RegionSeeder::class,
            // ProvinceSeeder::class,
            // CommuneSeeder::class,
            // ResponsabiliteSeeder::class,
            // UserSeeder::class,
            // AnneeSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
