<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    
    public function run()
    {
        Rating::create([
            'user_id' => 1,
            'product_id' => 1,
            'rating_value' => 4,
            'review_text' => 'Good product!',
            'rating_date' => now(),
        ]);

        Rating::create([
            'user_id' => 2,
            'product_id' => 2,
            'rating_value' => 5,
            'review_text' => 'It is bad.',
            'rating_date' => now(),
        ]);

        Rating::create([
            'user_id' => 3,
            'product_id' => 3,
            'rating_value' => 3,
            'review_text' => 'Not bad.',
            'rating_date' => now(),
        ]);
    }
}
