<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capteur;
use Illuminate\Support\Facades\Auth;


class CapteurController extends Controller
{
    public function index()
    {
        Auth::loginUsingId(1);
        // Récupère la liste des capteurs de l'utilisateur
        $capteurs = Capteur::where('user_id', auth()->id())->get();

        // Retourne la vue avec les capteurs
        return view('capteurs.index', compact('capteurs'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        // Création d'un nouveau capteur
        $capteur = new Capteur();
        $capteur->nom = $request->nom;
        $capteur->type = $request->type;
        $capteur->user_id = auth()->id(); // Assigne l'ID de l'utilisateur actuellement connecté
        $capteur->save();

        // Redirection vers la page des capteurs avec un message de succès
        return redirect()->route('capteurs.index')->with('success', 'Capteur ajouté avec succès.');
    }


    public function destroy(Capteur $capteur)
    {
        // Vérifie si l'utilisateur actuellement connecté est le propriétaire du capteur
        if ($capteur->user_id === auth()->id()) {
            // Supprime le capteur
            $capteur->delete();
            
            // Redirection vers la page des capteurs avec un message de succès
            return redirect()->route('capteurs.index')->with('success', 'Capteur supprimé avec succès.');
        } else {
            // Redirection vers la page des capteurs avec un message d'erreur
            return redirect()->route('capteurs.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce capteur.');
        }
    }

}
