<?php

namespace Modules\Blog\Tests\Feature\Factory;


use Modules\Blog\Models\Category;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\Tag;
use App\Models\User;

test("Blog belongs to many categories, and vice versa", function () {
    $blog = Blog::factory()->create();
    $cat1 = Category::factory()->create();
    $cat2 = Category::factory()->create();
    $blog->categories()->sync([$cat1->id, $cat2->id]);

    $this->assertDatabaseHas("blog_category", [
        "blog_id" => $blog->id,
        "category_id" => $cat1->id
    ])->assertDatabaseHas("blog_category", [
        "blog_id" => $blog->id,
        "category_id" => $cat2->id
    ]);
});

test("Blog belongs to many tags, and vice versa", function () {
    $blog = Blog::factory()->create();
    $cat1 = Tag::factory()->create();
    $cat2 = Tag::factory()->create();
    $blog->tags()->sync([$cat1->id, $cat2->id]);

    $this->assertDatabaseHas("blog_tag", [
        "blog_id" => $blog->id,
        "tag_id" => $cat1->id
    ])->assertDatabaseHas("blog_tag", [
        "blog_id" => $blog->id,
        "tag_id" => $cat2->id
    ]);
});

test("Blog belongs to many users, and vice versa", function () {
    $blog = Blog::factory()->create();
    $cat1 = User::factory()->create();
    $cat2 = User::factory()->create();
    $blog->users()->sync([$cat1->id, $cat2->id]);

    $this->assertDatabaseHas("blog_user", [
        "blog_id" => $blog->id,
        "author_id" => $cat1->id
    ])->assertDatabaseHas("blog_user", [
        "blog_id" => $blog->id,
        "author_id" => $cat2->id
    ]);
});
