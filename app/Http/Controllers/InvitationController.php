<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;  // Vous devrez créer un Mailable pour l'invitation

class InvitationController extends Controller
{
    // Méthode pour afficher le formulaire
    public function create()
    {
        return view('Invitation.create');
    }

    // Méthode pour envoyer l'invitation
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    // Définir une URL dynamique ou d'invitation
    $url = url('/invitation'); // Par exemple, une URL statique ou dynamique
    
    // Envoyer l'invitation avec l'URL
    Mail::to($request->email)->send(new InvitationMail($url));

    // Retourner un message de succès après l'envoi de l'invitation
    return redirect()->route('Invitation.create')->with('success', 'Invitation envoyée avec succès!');
}
}
