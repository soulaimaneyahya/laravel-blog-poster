<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->sentences(3, true),
            'created_at' => fake()->dateTimeBetween('-3 weeks')
        ];
    }

    public function lorem(): static
    {
        return $this->state(fn (array $attributes) => [
            'content' => 'lorem ipsum dolor sit amet.'
        ]);
    }
}
