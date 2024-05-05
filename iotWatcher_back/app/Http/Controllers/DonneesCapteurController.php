<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonneesCapteur;

class DonneesCapteurController extends Controller
{
    /**
     * Affiche la liste des données des capteurs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donneesCapteurs = DonneesCapteur::all();
        return view('donneesCapteurs.index', compact('donneesCapteurs'));
    }

    /**
     * Stocke de nouvelles données de capteurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'capteur_id' => 'required|exists:capteurs,id',
            'valeur' => 'required|numeric',
            'timestamp' => 'required|date',
        ]);

        DonneesCapteur::create($request->all());

        return redirect()->route('donneesCapteurs.index')
            ->with('success', 'Données de capteur ajoutées avec succès.');
    }

    /**
     * Supprime des données de capteurs spécifiques.
     *
     * @param  \App\Models\DonneesCapteur  $donneesCapteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonneesCapteur $donneesCapteur)
    {
        $donneesCapteur->delete();
        return redirect()->route('donneesCapteurs.index')
            ->with('success', 'Données de capteur supprimées avec succès.');
    }
}
