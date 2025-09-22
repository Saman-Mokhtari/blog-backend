<?php

namespace Modules\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Blog\Models\Blog;

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
    protected $model = \Modules\Blog\Models\Blog::class;


    public function definition(): array
    {

        return [
            'title'   => fake()->unique()->words(4, true),
            'slug'    => null,
            'excerp' => fake()->sentence(3),
            'content' => fake()->paragraph(),
            'status'  => fake()->randomElement(['published', 'draft', 'archived']),
            'cover'   => fake()->imageUrl(640, 480, null, true),
            'likes'   => fake()->numberBetween(0, 100),
            'views'   => fake()->numberBetween(0, 2000),
            'meta_data' => [
                'seo_title'       => fake()->sentence(1),
                'seo_description' => fake()->sentence(2),
                'tags'            => fake()->words(3),
            ],
        ];
    }

    public function draft(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => "draft"
        ]);
    }

    public function published(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => "published"
        ]);
    }

    public function archived(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => "archived"
        ]);
    }
}
