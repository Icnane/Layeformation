<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    public function index()
    {
        // Ajoute la logique ici pour récupérer les données de progression si nécessaire
        return view('partials.progression');
    }
}
