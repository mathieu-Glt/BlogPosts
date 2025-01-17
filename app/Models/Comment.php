<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_name',
        'article_id',
    ];

    // Définir la relation inverse entre Comment et Article
    public function article()
    {
        return $this->belongsTo(Article::class);  // Chaque commentaire appartient à un article
    }
}
