<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'content',
        'user_id',
        'article_id'
    ];
    
    // Een comment behoort tot een gebruiker
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Een comment behoort tot een article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}