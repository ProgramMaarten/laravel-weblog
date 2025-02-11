<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_category';

    protected $fillable = [
        'article_id',
        'category_id'
        // Voeg hier eventueel extra kolommen toe
    ];

    // Relatie met Article (optioneel)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Relatie met Category (optioneel)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}