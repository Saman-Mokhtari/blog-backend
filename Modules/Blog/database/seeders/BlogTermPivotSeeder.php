<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Models\Blog;
use Modules\Taxonomy\Models\Term;

class BlogTermPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::all();
        $categories = Term::whereHas('taxonomy', function($q) {
            $q->where('name', 'Category');
        })->get();
        $tags = Term::whereHas('taxonomy', function($q) {
            $q->where('name', 'Tag');
        })->get();
        foreach ($blogs as $blog) {
            for ($i = 0; $i < rand(1, 2); $i++) {
                $blog->terms()->syncWithoutDetaching($categories->random()->id);
            }
            for ($i = 0; $i < rand(1, 2); $i++) {
                $blog->terms()->syncWithoutDetaching($tags->random()->id);
            }
        }
    }
}
