<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function creerUtilisateur()
    {
        $utilisateur = new Utilisateur;
        $utilisateur->nom = 'John Doe';
        $utilisateur->email = 'john@example.com';
        $utilisateur->mot_de_passe = bcrypt('password');
        $utilisateur->save();

        return 'Utilisateur créé avec succès !';
    }

    public function listeUtilisateurs()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateurs.index', compact('utilisateurs'));
    }
}