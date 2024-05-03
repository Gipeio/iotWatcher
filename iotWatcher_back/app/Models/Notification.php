<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = ['utilisateur_id', 'type', 'condition', 'active'];

    // Relation avec l'utilisateur destinataire
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
