<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
   
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 19.99,
            'qty' => 100,
            'discount' => 5.00,
            'category_id' => 1,
            'rating_id' =>null,
            'image' => 'product1.jpg',
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 29.99,
            'qty' => 50,
            'discount' => 0.00,
            'category_id' => 2,
            'rating_id' =>null,
            'image' => 'product2.jpg',
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
            'price' => 39.99,
            'qty' => 75,
            'discount' => 8.00,
            'category_id' => 1,
            'rating_id' =>null,
            'image' => 'product3.jpg',
        ]);
    }
}
