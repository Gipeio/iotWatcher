<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function creerUtilisateur()
    {
        $users = new User;
        $users->nom = 'John Doe';
        $users->email = 'john@example.com';
        $users->mot_de_passe = bcrypt('password');
        $users->save();

        return 'Utilisateur créé avec succès !';
    }

    public function listeUtilisateurs()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
}