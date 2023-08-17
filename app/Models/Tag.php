<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Les attributs remplissables (fillable) du modèle.
    protected $fillable = [
        'name',
    ];

    /**
     * Définit la relation "plusieurs à plusieurs" avec le modèle Post.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
