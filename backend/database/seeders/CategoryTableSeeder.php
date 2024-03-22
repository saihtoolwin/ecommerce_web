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
            'parent_id'=>null,
            'name' => 'Electronics',
            'image' => 'electronics.jpg',
        ]);

        Category::create([
            'parent_id'=>null,
            'name' => 'Clothing',
            'image' => 'clothing.jpg',
        ]);

        Category::create([
            'parent_id'=>null,
            'name' => 'Home and Kitchen',
            'image' => 'home_and_kitchen.jpg',
        ]);
    }
}
