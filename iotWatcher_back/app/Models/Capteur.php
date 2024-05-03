<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capteur extends Model
{
    protected $table = 'capteurs';

    protected $fillable = ['nom', 'type', 'description', 'utilisateur_id'];

    // Relation avec l'utilisateur propriétaire
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    // Relation avec les données des capteurs
    public function donneesCapteurs()
    {
        return $this->hasMany(DonneeCapteur::class);
    }
}
