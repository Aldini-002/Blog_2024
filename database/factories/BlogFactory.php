<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(3, 5)),
            'body' => fake()->paragraph(rand(30, 15)) . '<br /><br />' . fake()->paragraph(rand(30, 15)) . '<br /><br />' . fake()->paragraph(rand(30, 15)),
            'image' => 'dumy' . rand(1, 4) . '.jpg',
            'url_image' => asset('image/dumy' . rand(1, 4) . '.jpg'),
            'user_id' => rand(1, 5)
        ];
    }
}
