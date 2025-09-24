<?php

namespace Modules\Taxonomy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Taxonomy\Models\Taxonomy;
use Modules\Taxonomy\Models\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = Taxonomy::where('name','Category')->firstOrFail();
        $tag = Taxonomy::where('name','Tag')->firstOrFail();

        $breadth = 3;
        $depth   = 3;
        $level = Term::factory()->count(3)->create(['taxonomy_id' => $cat->id]); // ریشه‌ها
        for ($d = 0; $d < $depth; $d++) {
            $next = collect();
            foreach ($level as $parent) {
                $children = Term::factory()->count($breadth)->create([
                    'taxonomy_id' => $cat->id,
                    'parent_id'   => $parent->id,
                ]);
                $next = $next->merge($children);
            }
            $level = $next;
        }
        Term::factory()->count(15)->create(['taxonomy_id' => $tag->id]);
    }
}
