<?php

use Tests\TestCase;

class CategoryTest extends TestCase
{

    // Successfully store a new category
    public function test_successfully_store_new_category()
    {
        // Arrange
        $this->withoutMiddleware();
        $categoryData = [
            'name' => 'New Category',
            'description' => 'A description for the new category'
        ];

        // Act
        $response = $this->post('/categories', $categoryData);

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
    }

    // Attempt to store a category with missing required fields
    public function test_store_category_with_missing_required_fields()
    {
        // Arrange
        $this->withoutMiddleware();
        $categoryData = [
            'description' => 'A description without a name'
        ];

        // Act
        $response = $this->post('/categories', $categoryData);

        // Assert
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }
}
