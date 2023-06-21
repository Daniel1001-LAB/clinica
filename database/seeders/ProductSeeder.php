<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'alergil',
            'cost' => 20,
            'price' => 50,
            'barcode' => '533421123123',
            'stock' => 5000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Product::create([
            'name' => 'sudagrip',
            'cost' => 10,
            'price' => 12,
            'barcode' => '654456546456',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Product::create([
            'name' => 'cofal',
            'cost' => 45,
            'price' => 60,
            'barcode' => '5331242112315',
            'stock' => 2000,
            'alerts' => 10,
            'category_id' => 3,
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Product::create([
            'name' => 'panadol azul',
            'cost' => 2,
            'price' => 5,
            'barcode' => '53934077434',
            'stock' => 5000,
            'alerts' => 10,
            'category_id' => 4,
            'image' => 'https://dummyimage.com/200x150/5c5756/fff'
        ]);
    }
}
