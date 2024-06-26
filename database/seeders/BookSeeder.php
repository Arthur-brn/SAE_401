<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->insert([
            [
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'picture' => 'hp_sorcerers_stone.jpg',
                'author_id' => 1,
                'editor_id' => 1,
                'language_id' => 1,
                'style' => 'fantastique',
                'type' => 'roman',
                'summary' => 'A young boy discovers he is a wizard and attends a magical school, where he makes friends and enemies and uncovers a dark secret.',
                'page_number' => 309,
                'edition_year' => 1997,
                'copy_number' => 10,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Game of Thrones',
                'picture' => 'game_of_thrones.jpg',
                'author_id' => 2,
                'editor_id' => 2,
                'language_id' => 1,
                'style' => 'fantasy épique',
                'type' => 'roman',
                'summary' => 'Noble families vie for control of the Iron Throne as an ancient enemy rises in the north.',
                'page_number' => 694,
                'edition_year' => 1996,
                'copy_number' => 7,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hobbit',
                'picture' => 'the_hobbit.jpg',
                'author_id' => 3,
                'editor_id' => 1,
                'language_id' => 1,
                'style' => 'fantasy épique',
                'type' => 'roman',
                'summary' => 'A hobbit embarks on a journey with a group of dwarves to reclaim their mountain home from a dragon.',
                'page_number' => 310,
                'edition_year' => 1937,
                'copy_number' => 8,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
