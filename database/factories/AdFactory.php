<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $slug = fake()->sentence(),
            'url' => Str::random(30),
            'slug' => Str::slug($slug, "-"),
            'country' => fake()->country(),
            'no_places' => fake()->numberBetween(1, 10),
            'desc' => fake()->sentence(20),
            'user_id' => User::factory()
        ];
    }
}
