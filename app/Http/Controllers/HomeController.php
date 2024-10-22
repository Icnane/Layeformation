<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Récupérer les modules avec leur formation associée
        $modules = Module::with('formation')->get();
        
        // Passer les modules à la vue
        return view('welcome', compact('modules'));
    }
}
