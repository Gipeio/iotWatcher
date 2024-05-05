<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CapteurController;
use App\Http\Controllers\CapteurNotificationController;
use App\Http\Controllers\DonneesCapteurController;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Tableau de bord
Route::get('/dashboard', [DashboardController::class, 'index']);


// Routes de gestion des capteurs
Route::prefix('capteurs')->name('capteurs.')->group(function () {
    Route::get('/', [CapteurController::class, 'index'])->name('index');
    Route::post('/', [CapteurController::class, 'store'])->name('store');
    Route::delete('/{capteur}', [CapteurController::class, 'destroy'])->name('destroy');
});


// Routes de gestion des notifications
Route::prefix('capteurNotifications')->name('capteurNotifications.')->group(function () {
    Route::get('/', [CapteurNotificationController::class, 'index'])->name('index');
    Route::post('/', [CapteurNotificationController::class, 'store'])->name('store');
    Route::put('/{notification}/markAsRead', [CapteurNotificationController::class, 'markAsRead'])->name('markAsRead');
    Route::delete('/{notification}', [CapteurNotificationController::class, 'destroy'])->name('destroy');
});

// Routes de gestion des données des capteurs
Route::prefix('donneesCapteurs')->name('donneesCapteurs.')->group(function () {
    Route::get('/', [DonneesCapteurController::class, 'index'])->name('index');
    Route::post('/', [DonneesCapteurController::class, 'store'])->name('store');
    Route::delete('/{donneesCapteur}', [DonneesCapteurController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
