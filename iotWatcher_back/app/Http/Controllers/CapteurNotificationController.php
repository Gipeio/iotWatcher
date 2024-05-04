<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CapteurNotification;

class CapteurNotificationController extends Controller
{
    public function index()
    {
        // Simuler un utilisateur authentifié
        Auth::loginUsingId(1);


        // Récupérer et afficher la liste des notifications de l'utilisateur
        $capteurNotifications = auth()->user()->capteurNotifications;
        return view('capteurNotifications.index', compact('capteurNotifications'));
    }

    public function store(Request $request)
    {

        // Valider et enregistrer une nouvelle notification
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        auth()->user()->notify(new Notification(['message' => $request->message]));

        return redirect()->route('capteurNotifications.index')->with('success', 'Notification créée avec succès.');
    }

    public function markAsRead(CapteurNotification $notification)
    {
        $notification->markAsRead();

        return redirect()->back()->with('success', 'Notification marquée comme lue avec succès.');
    }

    public function destroy(CapteurNotification $notification)
    {

        // Supprimer une notification
        $notification->delete();
        return redirect()->route('capteurNotifications.index')->with('success', 'Notification supprimée avec succès.');
    }
}
