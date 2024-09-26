<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Méthode pour gérer la connexion
    public function login(Request $request)
    {
        // Validation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérification des informations d'identification
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Connexion réussie, redirection vers la page de bienvenue
            auth()->login($user);
            return redirect()->route('welcome');  // Redirection vers la page welcome après connexion réussie
        } else {
            // Échec de la connexion, retour avec un message d'erreur
            return back()->withErrors(['email' => 'Identifiants incorrects.']);
        }
    }

    // Méthode pour gérer l'inscription
    public function register(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirection vers la page de connexion avec un message de succès
        return redirect()->route('login')->with('success', 'Compte créé avec succès, veuillez vous connecter.');
    }
}
