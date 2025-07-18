<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function membre_actif()
    {
        $user = Auth::user();
        if ($user->role_id == 3) {
            $collection = User::where('statut', '=', 'Actif')->where('role_id', '!=', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.pages.membres.actifs', compact('collection'));
        } else {
            $collection = User::where('statut', '=', 'Actif')->where('region_ordinal_id', '=', $user->region_ordinal_id)->where('role_id', '!=', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.pages.membres.actifs', compact('collection'));
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function membre_inactif()
    {
        $user = Auth::user();
        if ($user->role_id == 3) {
            $collection = User::where('statut', '=', 'En cours')->where('role_id', '!=', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.pages.membres.inactifs', compact('collection'));
        } else {
            $collection = User::where('statut', '=', 'En cours')->where('region_ordinal_id', '=', $user->region_ordinal_id)->where('role_id', '!=', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.pages.membres.inactifs', compact('collection'));
        }
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

        // Calcul automatique du montant de cotisation
        $responsabilite_id = $request->responsabilite_id;

        if ($responsabilite_id >= 1 && $responsabilite_id <= 5) {
            $request->merge(['montant_cotisation' => 100000]);
        } elseif ($responsabilite_id > 5 && $responsabilite_id <= 7) {
            $request->merge(['montant_cotisation' => 75000]);
        } elseif ($responsabilite_id > 7 && $responsabilite_id <= 15) {
            $request->merge(['montant_cotisation' => 30000]);
        }

        $finds->update([
            'statut' => 'Actif',
            'responsabilite_id' => $request->responsabilite_id,
            'montant_cotisation' => $request->montant_cotisation,
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
        $collection = User::where('statut', '=', 'Actif')->where('role_id', '=', 2)->orderBy('created_at', 'desc')->get();

        return view('admin.pages.membres.account', compact('collection'));
    }

    /**
     * Display the user account management page.
     *
     * @return \Illuminate\View\View
     */
    public function gest_admin()
    {
        $collection = User::where('statut', '=', 'Actif')->where('role_id', '=', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.pages.membres.account_admin', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function change_role(Request $request, string $id)
    {
        $finds = User::find($id);
        $finds->update([
            'role_id' => $request->role_id,
            'region_ordinal_id' => $request->region_ordinal_id
        ]);

        return redirect()->back()->with('success', 'Rôle utilisateur mis à jour avec succès.');
    }
}
