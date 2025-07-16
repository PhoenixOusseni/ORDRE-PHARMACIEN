<?php

namespace App\Http\Controllers;

use App\Models\AutreDiplome;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutreDiplomeController extends Controller
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
        //     'nature' => 'required|string|max:255',
        //     'date_diplome' => 'required|date',
        //     'user_id' => 'required|exists:users,id',
        // ]);

        AutreDiplome::create([
            'nature' => $request->nature,
            'date_diplome' => $request->date_diplome,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Diplôme ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AutreDiplome $autreDiplome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AutreDiplome $autreDiplome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AutreDiplome $autreDiplome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutreDiplome $autreDiplome)
    {
        //
    }
}
