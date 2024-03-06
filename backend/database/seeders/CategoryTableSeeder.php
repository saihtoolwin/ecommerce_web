<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Electronics',
            'image' => 'electronics.jpg',
        ]);

        Category::create([
            'name' => 'Clothing',
            'image' => 'clothing.jpg',
        ]);

        Category::create([
            'name' => 'Home and Kitchen',
            'image' => 'home_and_kitchen.jpg',
        ]);
    }
}
