<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/creer-utilisateur', [UtilisateurController::class, 'creerUtilisateur']);

Route::get('/utilisateurs', [UtilisateurController::class, 'listeUtilisateurs']);

require __DIR__.'/auth.php';
