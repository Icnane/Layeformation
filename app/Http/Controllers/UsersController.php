<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registers; // Modèle de la table registers
use App\Models\Users; // Modèle de la table users
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller


{
    
    public function login(Request $request)
    {
    // Validation des données d'entrée
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Vérifier si l'email existe dans la table registers
    $registeredUser = Registers::where('email', $request->input('email'))->first();

    // Debugging: affiche les informations utilisateur pour vérifier (à retirer après débogage)
    if ($registeredUser) {
        // dd($registeredUser); // Affiche les détails de l'utilisateur (à retirer après débogage)
    } else {
        return back()->withErrors(['email' => 'Aucun utilisateur trouvé avec cet email.']);
    }

    // Vérifie si l'utilisateur est enregistré et si le mot de passe est correct
    if ($registeredUser && Hash::check($request->input('password'), $registeredUser->password)) {
        // Enregistrer les informations de l'utilisateur dans la table users
        $user = Users::updateOrCreate(
            ['email' => $registeredUser->email], // Vérifie si l'email existe déjà dans la table users
            ['password' => bcrypt($request->input('password'))] // Crypte le mot de passe avant de le stocker
        );

        // Debugging: vérifier si l'utilisateur est bien enregistré (à retirer après débogage)
        if ($user) {
            // dd('Utilisateur enregistré dans la table users:', $user); // (à retirer après débogage)
        } else {
            return back()->withErrors(['email' => 'Échec de l\'enregistrement dans la table users.']);
        }

        // Authentifier l'utilisateur
        Auth::login($user);

        // Vérification si l'utilisateur est bien connecté (à retirer après débogage)
        if (Auth::check()) {
            // dd('Utilisateur connecté avec succès :', Auth::user()); // (à retirer après débogage)
        }

        // Redirection vers la page des formations après connexion réussie
        return redirect()->route('formation')->with('success', 'Connexion réussie, bienvenue aux formations !');
    }

    // Redirection avec message d'erreur si la vérification échoue
    return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
}
}