<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film')->insert([
            [
                'title' => 'Inception',
                'picture' => 'inception.jpg',
                'director_id' => 2, // Assurez-vous que le directeur avec cet ID existe
                'style' => 'science-fiction',
                'age_limit' => 13,
                'summary' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'duration' => 148,
                'year' => 2010,
                'copy_number' => 5,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Schindler\'s List',
                'picture' => 'schindlers_list.jpg',
                'director_id' => 1, // Assurez-vous que le directeur avec cet ID existe
                'style' => 'historique',
                'age_limit' => 16,
                'summary' => 'In German-occupied Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',
                'duration' => 195,
                'year' => 1993,
                'copy_number' => 3,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pulp Fiction',
                'picture' => 'pulp_fiction.jpg',
                'director_id' => 3, // Assurez-vous que le directeur avec cet ID existe
                'style' => 'policier',
                'age_limit' => 18,
                'summary' => 'The lives of two mob hitmen, a boxer, a gangster, and his wife intertwine in four tales of violence and redemption.',
                'duration' => 154,
                'year' => 1994,
                'copy_number' => 4,
                'loan_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
