<?php

namespace Modules\Blog\Tests\Feature\Factory;

use Tests\TestCase;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationshipFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_belongs_to_many_categories_and_vice_versa()
    {
        $blog = Blog::factory()->create();
        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();

        $blog->categories()->sync([$cat1->id, $cat2->id]);

        $this->assertDatabaseHas('blog_category', [
            'blog_id'     => $blog->id,
            'category_id' => $cat1->id,
        ]);

        $this->assertDatabaseHas('blog_category', [
            'blog_id'     => $blog->id,
            'category_id' => $cat2->id,
        ]);
    }

    public function test_blog_belongs_to_many_tags_and_vice_versa()
    {
        $blog = Blog::factory()->create();
        $tag1 = Tag::factory()->create();
        $tag2 = Tag::factory()->create();

        $blog->tags()->sync([$tag1->id, $tag2->id]);

        $this->assertDatabaseHas('blog_tag', [
            'blog_id' => $blog->id,
            'tag_id'  => $tag1->id,
        ]);

        $this->assertDatabaseHas('blog_tag', [
            'blog_id' => $blog->id,
            'tag_id'  => $tag2->id,
        ]);
    }

    public function test_blog_belongs_to_many_users_and_vice_versa()
    {
        $blog = Blog::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $blog->users()->sync([$user1->id, $user2->id]);

        $this->assertDatabaseHas('blog_user', [
            'blog_id'   => $blog->id,
            'author_id' => $user1->id,
        ]);

        $this->assertDatabaseHas('blog_user', [
            'blog_id'   => $blog->id,
            'author_id' => $user2->id,
        ]);
    }

    public function test_blogs_belongs_to_many_users_and_vice_versa()
    {
        $blog = Blog::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $blog->users()->sync([$user1->id, $user2->id]);

        $this->assertDatabaseHas('blog_user', [
            'blog_id'   => $blog->id,
            'author_id' => $user1->id,
        ]);

        $this->assertDatabaseHas('blog_user', [
            'blog_id'   => $blog->id,
            'author_id' => $user2->id,
        ]);
    }
}
