<?php

namespace Tests\Feature\Factory;

use Tests\TestCase;
use Modules\Blog\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_factory_with_random_status_created_successfully()
    {
        $blog = Blog::factory()->create();

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
        ]);
    }

    public function test_blog_factory_with_draft_status_created_successfully()
    {
        $blog = Blog::factory()->draft()->create();

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
        ]);
        $this->assertEquals('draft', $blog->status);
    }

    public function test_blog_factory_with_published_status_created_successfully()
    {
        $blog = Blog::factory()->published()->create();

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
        ]);

        $this->assertEquals('published', $blog->status);
    }

    public function test_blog_factory_with_archived_status_created_successfully()
    {
        $blog = Blog::factory()->archived()->create();

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
        ]);

        $this->assertEquals('archived', $blog->status);
    }
}
