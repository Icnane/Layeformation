<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class editprofilController extends Controller
{
    // Méthode pour afficher la page d'édition de profil
    public function edit()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Passer l'utilisateur à la vue
        return view('partials.editprofil', compact('user'));
    }

    // Méthode pour mettre à jour les informations du profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation des données
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Mise à jour des données de l'utilisateur
        $user->update([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
}
