<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'image_path' => fake()->image(),
            'publisher' => fake()->company(),
            'category' => fake()->randomElement(['Novel', 'Bioghraphy', 'Journal', 'Science']),
            'pages' => fake()->numberBetween(100, 1000),
            'language' => fake()->randomElement(['English', 'Dutch', 'Bahasa Indonesia', 'Mandarin', 'Portuguese']),
            'publish_date' => fake()->dateTimeThisYear(),
            'subjects' => fake()->randomElement(['Romance', 'Sci Fi', 'Mystery']),
            'desc' => fake()->text(),
            'isbn' => fake()->isbn13()
        ];
    }
}