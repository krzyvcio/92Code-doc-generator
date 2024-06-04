<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        $categories = Category::factory()->count(3)->create();

        // Act
        $response = $this->get('/categories');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('categories.index');
        $response->assertViewHas('categories', $categories);
    }

    public function testShow()
    {
        // Arrange
        $category = Category::factory()->create();

        // Act
        $response = $this->get('/categories/' . $category->id);

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('categories.show');
        $response->assertViewHas('category', $category);
    }

    public function testCreate()
    {
        // Act
        $response = $this->get('/categories/create');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('categories.create');
    }
}
