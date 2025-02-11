<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'email'    => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'password' => bcrypt('secret'), // Je kunt hier ook Hash::make gebruiken
            'premium'  => $this->faker->boolean(20), // 20% kans op premium
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
