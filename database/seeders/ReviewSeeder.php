<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([
            [
                'reviewable_type' => 'App\Models\Film',
                'reviewable_id' => 1,
                'user_id' => 1,
                'review_content' => 'Great movie, highly recommended!',
                'review_mark' => 5,
                'post_date' => '2024-05-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reviewable_type' => 'App\Models\Book',
                'reviewable_id' => 1,
                'user_id' => 2,
                'review_content' => 'Amazing book, couldn\'t put it down!',
                'review_mark' => 5,
                'post_date' => '2024-05-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
