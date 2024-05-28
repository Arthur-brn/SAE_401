<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice')->insert([
            [
                'user_id' => 2,
                'book_id' => 1,
                'film_id' => null,
                'notice_content' => 'Great book! Highly recommended!',
                'notice_mark' => 5,
                'post_date' => '2024-05-15',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'book_id' => null,
                'film_id' => 1,
                'notice_content' => 'Fantastic movie! Must watch!',
                'notice_mark' => 5,
                'post_date' => '2024-05-20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'book_id' => 2,
                'film_id' => null,
                'notice_content' => 'Interesting book. Enjoyed reading it.',
                'notice_mark' => 4,
                'post_date' => '2024-05-25',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
