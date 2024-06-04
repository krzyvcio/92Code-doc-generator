<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * This function creates two categories in the database: 'Zwykły' and 'Tabelaryczny'.
     * Each category has a name and a description.
     *
     * @return void
     */
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
