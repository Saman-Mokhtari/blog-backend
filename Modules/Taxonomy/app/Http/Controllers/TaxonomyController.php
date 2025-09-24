<?php

namespace Modules\Taxonomy\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\Taxonomy\Database\Factories\TaxonomyFactory;
use Modules\Taxonomy\Models\Taxonomy;
use Modules\Taxonomy\Models\Term;

class TaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        $terms = $blogs->random()->terms()->taxonomy()->where('name', 'Category');
        $cat = $terms->taxonomy;
        dd($cat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Taxonomy::create([
            'name' => 'Category',
            'slug' => 'category',
            'description' => 'Blog categories',
            'hierarchical' => true,
        ]);
        Taxonomy::create([
            'name' => 'Tag',
            'slug' => 'tag',
            'description' => 'Blog tags',
            'hierarchical' => false,
        ]);
        Term::create([
            'term' => 'Laravel',
            'slug' => 'laravel',
            'taxonomy_id' => Taxonomy::where('slug', 'tag')->first()->id,
            'description' => 'Laravel tag',
        ]);
        Term::create([
            'term' => 'Clothes',
            'slug' => 'clothes',
            'taxonomy_id' => Taxonomy::where('slug', 'category')->first()->id,
            'description' => 'Clothes category',
        ]);
        Term::create([
            'term' => 'Pants',
            'slug' => 'pants',
            'taxonomy_id' => Taxonomy::where('slug', 'category')->first()->id,
            'parent_id' => Term::where('slug', 'clothes')->first()->id,
            'description' => 'Pants category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('taxonomy::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('taxonomy::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
