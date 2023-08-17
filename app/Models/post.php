<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;

    // Les attributs remplissables (fillable) du modèle.
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
    ];

    /**
     * Définit la relation "plusieurs à plusieurs" avec le modèle Tag.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Définit la relation "un à plusieurs" avec le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
