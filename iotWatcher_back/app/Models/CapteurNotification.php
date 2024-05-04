<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapteurNotification extends Model
{
    protected $table = 'capteur_notifications';

    protected $fillable = ['utilisateur_id', 'type', 'condition', 'active'];

    // Relation avec l'utilisateur destinataire
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }
}
