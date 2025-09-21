<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Controllers\CategoryController;
use Modules\Blog\Http\Controllers\TagController;

// Blogs
Route::apiResource('blogs', BlogController::class);
Route::post('blogs/{blog}/restore', [BlogController::class, 'restore'])->name('api.blogs.restore');

// Categories
Route::apiResource('categories', CategoryController::class);
Route::post('categories/{category}/restore', [CategoryController::class, 'restore'])->name('api.categories.restore');

// Tags
Route::apiResource('tags', TagController::class);
Route::post('tags/{tag}/restore', [TagController::class, 'restore'])->name('api.tags.restore');
