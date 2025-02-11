<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    
    // Een categorie behoort tot meerdere artikelen
    public function articles() {
        return $this->belongsToMany(Article::class, 'article_category')->withTimestamps();
    }
}