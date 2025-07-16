<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutreDiplome;
use App\Models\Cotisation;
use App\Models\Fonction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Display the authentication page.
     *
     * @return \Illuminate\View\View
     */
    public function auth()
    {
        return view('pages.auth.connexion');
    }

    /**
     * Display the registration page.
     *
     * @return \Illuminate\View\View
     */
    public function inscription()
    {
        return view('pages.auth.inscription');
    }

    public function compte()
    {
        $finds = Auth::user();
        // Assuming you want to pass the authenticated user's data to the view
        if (!$finds) {
            return redirect()->route('authentification')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        // Return the view with the user's data
        $autres_diplomes = AutreDiplome::where('user_id', $finds->id)->get();
        $fonctions = Fonction::where('user_id', $finds->id)->get();
        return view('pages.users.profile', compact('finds', 'autres_diplomes', 'fonctions'));
    }

    public function cotisations()
    {
        // Retrieve all cotisations
        $cotisations = Cotisation::orderBy('created_at', 'desc')->get();
        $total = $cotisations->sum('montant');

        return view('pages.cotisation.list', compact('cotisations', 'total'));
    }

    public function mescotisations()
    {
        // Retrieve the authenticated user's cotisations
        $user = Auth::user();
        $cotisations = Cotisation::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')->get();

        return view('pages.cotisation.mes-cotisations', compact('cotisations'));
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function admin()
    {
        // Assuming you want to pass some data to the dashboard view
        $current_date = date('Y/m/d');
        $actifs = User::where('statut', 'Actif')->get(); //
        $inactifs = User::where('statut', 'En cours')->get();
        $cotisations = Cotisation::where('date', '=', $current_date)->get();
        $total = $cotisations->sum('montant');

        return view('admin.pages.dashboard', compact('actifs', 'inactifs', 'cotisations', 'total'));
    }

    public function errors()
    {
        return view('pages.errors_404');
    }
}
