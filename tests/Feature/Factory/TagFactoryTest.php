<?php

use App\Models\Tag;

test("Tag factory created successfuly", function () {
    $blog = Tag::factory()->create();

    $this->assertDatabaseHas("tags", [
        "name" => $blog->name
    ]);
});
