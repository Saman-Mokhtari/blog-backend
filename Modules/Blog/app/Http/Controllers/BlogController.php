<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog::show');
    }

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
