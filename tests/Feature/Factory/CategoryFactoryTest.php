<?php

use App\Models\Category;

test("Category factory created successfuly", function () {
    $blog = Category::factory()->create();

    $this->assertDatabaseHas("categories", [
        "name" => $blog->name
    ]);
});
