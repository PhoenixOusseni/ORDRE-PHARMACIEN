<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'intitule' => 'required|string|max:255',
        //     'date_debut' => 'required|date',
        //     'date' => 'nullable|date|after_or_equal:date',
        //     'user_id' => 'required|exists:users,id',
        // ]);

        Fonction::create([
            'libelle' => $request->libelle,
            'date' => $request->date,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Fonction ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fonction $fonction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fonction $fonction)
    {
        //
    }
}
