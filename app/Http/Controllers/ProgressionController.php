<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    public function index()
    {
        // Exemple de logique pour calculer la progression
        // Adaptez ceci en fonction de votre logique réelle pour calculer le pourcentage
        $score = 85; // Ce score viendrait probablement d'un modèle ou d'une base de données
        $total = 100; // Le score total possible, ajustez en fonction de votre cas

        // Calcul du pourcentage
        $poucentage = ($score / $total) * 100;

        // Message à afficher, vous pouvez également l'ajuster selon votre logique
        $message = 'Félicitations, vous avez réussi le quiz !';

        // Passer les variables à la vue
        return view('partials.progression', compact('poucentage', 'message'));
    }
}
