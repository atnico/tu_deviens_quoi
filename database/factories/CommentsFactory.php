<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Quacks;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->text(),
            'image' => 'default_quack.jpg',
            'tags' => fake()->text(),
            'user_id' => rand(1, User::count()),
            'quack_id' => rand(1, Quacks::count()),
            
        ];
    }
}
