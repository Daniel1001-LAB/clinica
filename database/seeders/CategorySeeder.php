<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'ALERGIAS',
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Category::create([
            'name' => 'GRIPES',
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Category::create([
            'name' => 'DOLORES MUSCULARES',
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Category::create([
            'name' => 'DOLORES DE CABEZA',
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);
    }
}
