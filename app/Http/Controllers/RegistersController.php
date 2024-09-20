<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;
use Illuminate\Support\Facades\Hash;

class RegistersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string',
            'email' => 'required|email|unique:registers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Registers::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home')->with('success', 'Votre compte a été créé avec succès !');
    }
}