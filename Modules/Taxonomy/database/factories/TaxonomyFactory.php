<?php

namespace Modules\Taxonomy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaxonomyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Taxonomy\Models\Taxonomy::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name = fake()->randomElement(['Category', 'Tag']);
        return [
            'id' => fake()->uuid(),
            'name' => $name,
            'slug' => null,
            'description' => fake()->realText(100),
            'hierarchical' => rand(0, 1),
        ];
    }
}
