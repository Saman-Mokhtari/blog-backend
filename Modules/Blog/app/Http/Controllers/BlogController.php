<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Tag;
use Modules\Blog\Transformers\Blog\BlogCollection;
use Modules\Blog\Transformers\Blog\BlogResource;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show(Blog $blog) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog) {}

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Blog $blog) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog) {}
}
