<?php

namespace Modules\Taxonomy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Taxonomy\Models\Taxonomy;

class TaxonomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxonomies = [[
            'name' => 'Category',
            'description' => 'This is Category taxonomy',
            'hierarchical' => true,
        ], [
            'name' => 'Tag',
            'description' => 'This is Tag taxonomy',
            'hierarchical' => false,
        ]];

        foreach ($taxonomies as $taxonomy)
        {
            Taxonomy::firstOrCreate($taxonomy);
        }
    }
}
