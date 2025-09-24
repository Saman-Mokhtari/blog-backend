<?php

namespace Modules\Taxonomy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Taxonomy\Models\Taxonomy;

class TermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Taxonomy\Models\Term::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'term' => fake()->unique()->words(rand(1,3), true),
            'slug' => null,
            'description' => fake()->realText(100),
            'taxonomy_id' => null,
            'parent_id' => null,
        ];
    }
}
