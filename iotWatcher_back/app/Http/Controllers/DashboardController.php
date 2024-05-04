<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capteur;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        Auth::loginUsingId(1);
        // Récupère la liste des capteurs de l'utilisateur (tu devras adapter cette logique selon tes besoins)
        $capteurs = Capteur::where('user_id', auth()->id())->get();

        // Retourne la vue du tableau de bord avec les données des capteurs
        return view('dashboard', compact('capteurs'));
    }
}
