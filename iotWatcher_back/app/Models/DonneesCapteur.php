<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonneesCapteur extends Model
{
    protected $table = 'donnees_capteurs';

    protected $fillable = ['capteur_id', 'valeur', 'timestamp'];

    // Relation avec le capteur associé
    public function capteur()
    {
        return $this->belongsTo(Capteur::class);
    }
}
