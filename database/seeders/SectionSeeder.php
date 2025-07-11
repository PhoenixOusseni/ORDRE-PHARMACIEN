<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'code' => 'A',
                'libelle' => 'Section A',
                'description' => 'Description de la Section A',
            ],
            [
                'code' => 'B',
                'libelle' => 'Section B',
                'description' => 'Description de la Section B',
            ],
            [
                'code' => 'C',
                'libelle' => 'Section C',
                'description' => 'Description de la Section C',
            ],
            [
                'code' => 'D',
                'libelle' => 'Section D',
                'description' => 'Description de la Section D',
            ],
        ]);
    }
}
