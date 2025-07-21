<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annee;
use App\Models\Cotisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all cotisations
        $cotisations = Cotisation::orderBy('created_at', 'desc')->get();
        $total = $cotisations->sum('montant');

        return view('admin.pages.cotisations.index', compact('cotisations', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $cotisations = Cotisation::whereDate('created_at', '>=', $date_debut)->whereDate('created_at', '<=', $date_fin)->get();
        $total = $cotisations->sum('montant');

        return view('admin.pages.cotisations.index', compact('cotisations', 'total'));
    }

    /**
     * Display the specified resource.
     */
    public function print(string $id)
    {
        $finds = Cotisation::find($id);

        return view('admin.pages.cotisations.print_cotisation', compact('finds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all cotisations
        $users = User::where('statut', '=', 'Actif')->orderBy('nom', 'desc')->get();
        $annees = Annee::where('statut', 'Activé')->get();

        return view('admin.pages.cotisations.create', compact('users', 'annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'date' => 'required|date',
        //     'annee' => 'required|integer|min:1900|max:' . date('Y'),
        //     'mode' => 'required|string|max:255',
        //     'montant' => 'required|numeric|min:0',
        //     'observation' => 'nullable|string|max:1000',

        // ]);

        // Create a new cotisation record
        Cotisation::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'annee_id' => $request->annee_id,
            'mode' => $request->mode,
            'montant' => $request->montant,
            'desc' => $request->desc,
        ]);

        return redirect()->back()->with('success', 'Cotisation enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        // Retrieve the cotisation by ID
        $finds = Cotisation::findOrFail($id);

        // Return the view with the cotisation data
        return view('admin.pages.cotisations.show', compact('finds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotisation $cotisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotisation $cotisation)
    {
        //
    }
}
