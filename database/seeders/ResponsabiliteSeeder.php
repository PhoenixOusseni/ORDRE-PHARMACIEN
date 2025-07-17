<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResponsabiliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('responsabilites')->insert([
            // Pour les 100.000
            [
                'libelle' => 'Pharmacien titulaire d’officine',
            ],
            [
                'libelle' => 'Pharmacien remplaçant d’officine',
            ],
            [
                'libelle' => 'Pharmacien titulaire de laboratoire de biologies médicales',
            ],
            [
                'libelle' => 'Pharmacien responsable des établissements de vente et ou de distribution en gros',
            ],
            [
                'libelle' => 'Pharmacien responsable d’agence de promotion pharmaceutique',
            ],

            // Pour les 75.000
            [
                'libelle' => 'Pharmacien des établissements grossistes-répartiteurs',
            ],
            [
                'libelle' => 'Pharmacien responsable de laboratoire de biologie médicale privé',
            ],

            // Pour les 30.000
            [
                'libelle' => 'Pharmacien de l’administration publique',
            ],
            [
                'libelle' => 'Pharmacien des ONG et institutions internationales',
            ],
            [
                'libelle' => 'Pharmacien assistant dans les officines',
            ],
            [
                'libelle' => 'Pharmacien enseignant hospitalo-universitaire et/ou de la recherche',
            ],
            [
                'libelle' => 'Pharmacien de pharmacie à usage intérieur',
            ],
            [
                'libelle' => 'Pharmacien de laboratoire d’analyse biomédicale publique',
            ],
            [
                'libelle' => 'Pharmacien nouvellement inscrit',
            ],
        ]);
    }
}
