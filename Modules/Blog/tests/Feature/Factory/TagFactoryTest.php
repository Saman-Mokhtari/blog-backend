<?php

namespace Modules\Blog\Tests\Feature\Factory;

use Tests\TestCase;
use Modules\Blog\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_factory_created_successfully()
    {
        $tag = Tag::factory()->create();

        $this->assertDatabaseHas('tags', [
            'name' => $tag->name,
        ]);
    }
}
