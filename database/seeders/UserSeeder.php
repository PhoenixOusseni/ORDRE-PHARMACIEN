<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'matricule' => '123456',
                'nom' => 'OUEDRAOGO',
                'prenom' => 'Ousseni',
                'telephone' => '123456789',
                'role_id' => 1,
                'section_id' => 1,
                'region_ordinal_id' => 1,
                'statut' => 'En cours',
                'email' => 'membre1@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '123456',
                'nom' => 'KY',
                'prenom' => 'Yssara',
                'telephone' => '123456789',
                'role_id' => 1,
                'section_id' => 2,
                'region_ordinal_id' => 2,
                'statut' => 'En cours',
                'email' => 'membre2@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '123456',
                'nom' => 'BARRY',
                'prenom' => 'Youssouf',
                'telephone' => '123456789',
                'role_id' => 1,
                'section_id' => 3,
                'region_ordinal_id' => 3,
                'statut' => 'En cours',
                'email' => 'membre3@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '654321',
                'nom' => 'SOME',
                'prenom' => 'Aissatou',
                'telephone' => '987654321',
                'role_id' => 2,
                'section_id' => 2,
                'region_ordinal_id' => 1,
                'statut' => 'Actif',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '654321',
                'nom' => 'KABORE',
                'prenom' => 'Aminata',
                'telephone' => '987654321',
                'role_id' => 2,
                'section_id' => 2,
                'region_ordinal_id' => 2,
                'statut' => 'Actif',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '654321',
                'nom' => 'KOUASSI',
                'prenom' => 'Jean',
                'telephone' => '987654321',
                'role_id' => 2,
                'section_id' => 3,
                'region_ordinal_id' => 3,
                'statut' => 'Actif',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '789012',
                'nom' => 'KABORE',
                'prenom' => 'Jean',
                'telephone' => '456789123',
                'role_id' => 3,
                'section_id' => 3,
                'statut' => 'Actif',
                'region_ordinal_id' => 3,
                'email' => 's-admin@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
