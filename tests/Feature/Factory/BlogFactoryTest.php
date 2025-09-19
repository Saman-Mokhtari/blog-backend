<?php

use App\Models\Blog;

test("Blog factory with random status created successfuly", function () {
    $blog = Blog::factory()->create();

    $this->assertDatabaseHas("blogs", [
        "id" => $blog->id
    ]);
});

test("Blog factory with draft status created successfuly", function () {
    $blog = Blog::factory()->draft()->create();

    $this->assertDatabaseHas("blogs", [
        "id" => $blog->id
    ]);
    $this->assertEquals("draft", $blog->status);
});

test("Blog factory with published status created successfuly", function () {
    $blog = Blog::factory()->published()->create();

    $this->assertDatabaseHas("blogs", [
        "id" => $blog->id
    ]);
    $this->assertEquals("published", $blog->status);
});

test("Blog factory with archived status created successfuly", function () {
    $blog = Blog::factory()->archived()->create();

    $this->assertDatabaseHas("blogs", [
        "id" => $blog->id
    ]);
    $this->assertEquals("archived", $blog->status);
});
