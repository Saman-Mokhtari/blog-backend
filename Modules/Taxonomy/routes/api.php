<?php

use Illuminate\Support\Facades\Route;
use Modules\Taxonomy\Http\Controllers\TaxonomyController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('taxonomies', TaxonomyController::class)->names('taxonomy');
});
