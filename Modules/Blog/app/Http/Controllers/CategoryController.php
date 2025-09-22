<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Category;
use Modules\Blog\Transformers\Category\CategoryCollection;
use Modules\Blog\Transformers\Category\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) {}

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Category $category) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {}
}
