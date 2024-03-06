<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            PermissionTableSeeder::class,
            CategoryTableSeeder::class,
            ProductTableSeeder::class,
            RatingTableSeeder::class,
        ]);
    }
}
