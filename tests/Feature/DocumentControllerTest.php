<?php

namespace Tests\Feature;

use App\Models\Document;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Act
        $response = $this->get('/documents');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('documents.index');
    }

    public function testCreate()
    {
        // Act
        $response = $this->get('/documents/create');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('documents.create');
    }

    public function testEdit()
    {
        // Arrange
        $document = Document::factory()->create();

        // Act
        $response = $this->get('/documents/' . $document->id . '/edit');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('documents.edit');
        $response->assertViewHas('document', $document);
    }
}
