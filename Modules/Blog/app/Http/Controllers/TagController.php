<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Tag;

class TagController extends Controller
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
    public function show(Tag $tag)
    {
        return view('blog::show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag) {}

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Tag $tag) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag) {}
}
