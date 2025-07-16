<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Handle the user login request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valider les données reçues
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Tenter l'authentification
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // protège contre les attaques de session fixation

            return redirect()->intended('dashboard')->with('success', 'Connexion réussie');
        }

        // Échec : on retourne avec un message sans révéler la cause exacte
        return back()->withErrors([
            'email' => 'Les identifiants sont invalides.',
        ])->onlyInput('email');
    }

    /**
     * Handle the user logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Protection CSRF

        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }

    /**
     * Handle the user registration request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_user(Request $request)
    {
        // Calculer l'âge à partir de la date de naissance
        $date_naiss = Carbon::parse($request->date_naiss);
        $age = $date_naiss->diffInYears(Carbon::now());

        if ($age < 25) {
            return redirect()->back()->with('error', 'Vous devez avoir au moins 25 ans pour vous inscrire.');
        }

        // Vérifier que la date_diplome ne dépasse pas la date d'aujourd'hui
        if (Carbon::parse($request->date_diplome)->gt(Carbon::today())) {
            return redirect()->back()->with('error', 'La date d\'obtention du diplôme ne peut pas être postérieure à aujourd\'hui.');
        }

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->nom_jeune_fille = $request->nom_jeune_fille;
        $user->matricule = $request->matricule;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->date_naiss = $request->date_naiss;
        $user->lieu_naiss = $request->lieu_naiss;
        $user->nationalite = $request->nationalite;

        $user->situation_matrimoniale = $request->situation_matrimoniale;
        $user->adresse = $request->adresse;
        $user->domicile = $request->domicile;
        $user->num_rccm = $request->num_rccm;
        $user->lieu_exercice = $request->lieu_exercice;
        $user->statut = $request->statut;

        $user->region_ordinal_id = $request->region_ordinal_id;
        $user->region_id = $request->region_id;
        $user->commune_id = $request->commune_id;
        $user->section_id = $request->section_id;
        $user->province_id = $request->province_id;
        $user->role_id = $request->role_id;

        $user->responsabilite = $request->responsabilite;
        $user->montant_cotisation = $request->montant_cotisation;

        $user->date_diplome = $request->date_diplome;
        $user->inst_delivre = $request->inst_delivre;
        $user->lieu_delivrance = $request->lieu_delivrance;

        $user->password = Hash::make('12345678'); // Mot de passe par défaut, à changer après la première connexion

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pieces_jointes', 'public');
            $user['file'] = $path;
        }

        if ($request->hasFile('diplome')) {
            $path = $request->file('diplome')->store('diplome', 'public');
            $user['diplome'] = $path;
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $user['photo'] = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Inscription réussie. Veuillez patientez pour l\'activation de votre compte, Votre mot de passe est 12345678');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->nom_jeune_fille = $request->nom_jeune_fille;
        $user->matricule = $request->matricule;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->date_naiss = $request->date_naiss;
        $user->lieu_naiss = $request->lieu_naiss;
        $user->nationalite = $request->nationalite;

        $user->situation_matrimoniale = $request->situation_matrimoniale;
        $user->adresse = $request->adresse;
        $user->domicile = $request->domicile;
        $user->num_rccm = $request->num_rccm;
        $user->lieu_exercice = $request->lieu_exercice;

        $user->region_ordinal_id = $request->region_ordinal_id;
        $user->region_id = $request->region_id;
        $user->commune_id = $request->commune_id;
        $user->section_id = $request->section_id;
        $user->province_id = $request->province_id;

        $user->fonction_id = $request->fonction_id;
        $user->responsabilite = $request->responsabilite;
        $user->montant_cotisation = $request->montant_cotisation;

        $user->date_diplome = $request->date_diplome;
        $user->inst_delivre = $request->inst_delivre;
        $user->lieu_delivrance = $request->lieu_delivrance;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pieces_jointes', 'public');
            $user['file'] = $path;
        }

        if ($request->hasFile('diplome')) {
            $path = $request->file('diplome')->store('diplome', 'public');
            $user['diplome'] = $path;
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $user['photo'] = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Mise à jour réussie.');
    }
}
