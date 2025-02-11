<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content'   => $this->faker->sentence,
            'user_id'   => function () {
                return User::inRandomOrder()->value('id');
            },
            'article_id'=>  function () {
                return Article::inRandomOrder()->value('id');
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}