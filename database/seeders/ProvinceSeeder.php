<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
            ['code' => 'BKF00101', 'libelle' => 'Province 1', 'region_id' => 1],
            ['code' => 'BKF00201', 'libelle' => 'Province 2', 'region_id' => 2],
            ['code' => 'BKF00301', 'libelle' => 'Province 3', 'region_id' => 3],
            ['code' => 'BKF04101', 'libelle' => 'Province 4', 'region_id' => 4],
        ]);
    }
}
