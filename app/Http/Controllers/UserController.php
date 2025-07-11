<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function membre_actif()
    {
        $collection = User::where('statut', '=', 'Actif') ->orderBy('created_at', 'desc')->get();

        return view('admin.pages.membres.actifs', compact('collection'));
    }

    /**
     * Display a listing of the resource.
     */
    public function membre_inactif()
    {
        $collection = User::where('statut', '=', 'En cours') ->orderBy('created_at', 'desc')->get();

        return view('admin.pages.membres.inactifs', compact('collection'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finds = User::findOrFail($id);
        return view('admin.pages.membres.show', compact('finds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Activate the specified user account.
     */
    public function activate(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'statut' => 'Actif',
        ]);
        return redirect()->route('membre_actif')->with('success', 'Compte activé avec succès.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profil_image(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'photo' => $request->photo->store('profile', 'public'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the user account management page.
     *
     * @return \Illuminate\View\View
     */
    public function gest_account()
    {
        $collection = User::where('statut', '=', 'Actif')
            ->orderBy('created_at', 'desc')->get();

        return view('admin.pages.membres.account', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function change_role(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'role_id' => $request->role_id,
        ]);

        return redirect()->back()->with('success', 'Rôle utilisateur mis à jour avec succès.');
    }
}
