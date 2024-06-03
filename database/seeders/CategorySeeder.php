<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function run(): void
    {
        Category::create([
            'name' => 'Zwykły',
            'description' => 'Zwykły regularny dokument firmowy',
        ]);

        Category::create([
            'name' => 'Tabelaryczny',
            'description' => 'Tabelaryczny dokument firmowy',
        ]);
    }
}