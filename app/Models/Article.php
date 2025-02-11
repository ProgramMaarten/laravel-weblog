<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'is_premium'
    ];
    
    // Een article behoort tot een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Een article behoort tot meerdere categorieën (pivot table: article_category)
    public function categories() {
        return $this->belongsToMany(Category::class, 'article_category')->withTimestamps();
    }

    // Een article kan meerdere comments hebben
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}