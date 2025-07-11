<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communes')->insert([
            ['libelle' => 'Ouagadougou', 'province_id' => 1],
            ['libelle' => 'Koudougou', 'province_id' => 2],
            ['libelle' => 'Kaya', 'province_id' => 3],
            ['libelle' => 'Tenkodogo', 'province_id' => 4],
        ]);
    }
}
