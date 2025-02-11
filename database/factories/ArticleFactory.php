<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            //'user_id'   => User::factory(), // Maak een nieuwe user als deze niet bestaat
            'user_id' => function () {    return User::inRandomOrder()->value('id');}, // Kies een bestaande user die het article heeft gemaakt
            'title'     => $this->faker->sentence,
            'content'   => $this->faker->paragraphs(3, true),
            'image'     => $this->faker->imageUrl(640, 480, 'articles', true),
            'is_premium'=> $this->faker->boolean(35), // 35% kans dat artikel premium is
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
