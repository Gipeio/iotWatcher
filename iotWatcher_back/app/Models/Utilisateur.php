<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';

    protected $fillable = ['nom', 'email', 'mot_de_passe'];

    // Relation avec les capteurs
    public function capteurs()
    {
        return $this->hasMany(Capteur::class);
    }

    // Relation avec les notifications
    public function capteurNotifications()
    {
        return $this->hasMany(CapteurNotification::class);
    }
}
