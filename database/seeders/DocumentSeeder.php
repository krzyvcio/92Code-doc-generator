<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Document::create(
            [
                "name" => "test",
                "body" => "test",
                "user_id" => User::first()->id,
                "slug" => "test",
                "created_at" => now(),
                "updated_at" => now(),
                "category_id" => 1,
            ]
        );
    }
}
