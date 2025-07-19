<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all 'Annee' records from the database
        $collection = Annee::all();

        // Return the view with the collection of 'Annee' records
        return view('admin.pages.exercice.index', compact('collection'));
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
        // Create a new Annee record
        Annee::create($request->all());

        // Redirect back to the index with a success message
        return redirect()->route('gestion_exercice.index')->with('success', 'Exercice crée avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annee $annee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annee $annee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annee $annee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annee $annee)
    {
        //
    }
}
