<?php

namespace Modules\Blog\Tests\Feature\Factory;

use Tests\TestCase;
use Modules\Blog\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_factory_created_successfully()
    {
        $category = Category::factory()->create();

        $this->assertDatabaseHas('categories', [
            'name' => $category->name,
        ]);
    }
}
