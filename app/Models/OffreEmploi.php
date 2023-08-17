<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreEmploi extends Model
{
    use HasFactory;

    // Les attributs remplissables (fillable) du modèle.
    protected $fillable = [
        'intitule',
        'offre',
        'periode',
        'mission',
        'description',
        'pourvue',
    ];

    /**
     * Définit la relation "un à plusieurs" avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
