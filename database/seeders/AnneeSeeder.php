<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('annees')->insert([
            [
                'annee' => 2025,
                'statut' => 'Activé',
            ],
        ]);
    }
}
