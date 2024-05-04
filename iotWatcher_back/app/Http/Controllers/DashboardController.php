<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capteur;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupère la liste des capteurs de l'utilisateur (tu devras adapter cette logique selon tes besoins)
        $capteurs = Capteur::where('utilisateur_id', auth()->id())->get();

        // Retourne la vue du tableau de bord avec les données des capteurs
        return view('dashboard', compact('capteurs'));
    }
}
