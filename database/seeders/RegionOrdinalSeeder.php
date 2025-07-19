<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionOrdinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('region_ordinals')->insert([
            ['libelle' => 'REGION ORDINALE DE L’OUEST', 'code' => 'R2'],
            ['libelle' => 'REGION ORDINALE DU CENTRE', 'code' => 'R1'],
            ['libelle' => 'REGION ORDINALE DE L’EST', 'code' => 'R3'],
        ]);
    }
}
