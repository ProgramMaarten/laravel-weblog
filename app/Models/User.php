<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'username',
        'password',
        'premium'
    ];

    // Een gebruiker kan meerdere artikelen hebben
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Een gebruiker kan meerdere comments plaatsen
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}