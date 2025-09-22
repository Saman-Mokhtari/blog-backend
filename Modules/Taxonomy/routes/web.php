<?php

use Illuminate\Support\Facades\Route;
use Modules\Taxonomy\Http\Controllers\TaxonomyController;

Route::middleware(["auth:sanctum"])->group(function () {
    Route::resource('taxonomies', TaxonomyController::class)->names('taxonomy');
});
