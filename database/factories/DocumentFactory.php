<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "slug" => $this->faker->slug,
            "description" => $this->faker->text,
            "icon" => $this->faker->icon,
            "status" => $this->faker->status,
            "created_by" => $this->faker->created_by,
            "updated_by" => $this->faker->updated_by,
            "deleted_by" => $this->faker->deleted_by,
            "deleted_at" => $this->faker->deleted_at,

        ];
    }
}