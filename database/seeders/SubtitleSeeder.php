<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubtitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subtitle')->insert([
            [
                'film_id' => 1, // Assurez-vous que le film avec cet ID existe
                'language_id' => 1, // Assurez-vous que la langue avec cet ID existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 1, // Assurez-vous que le film avec cet ID existe
                'language_id' => 2, // Assurez-vous que la langue avec cet ID existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2, // Assurez-vous que le film avec cet ID existe
                'language_id' => 1, // Assurez-vous que la langue avec cet ID existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2, // Assurez-vous que le film avec cet ID existe
                'language_id' => 3, // Assurez-vous que la langue avec cet ID existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
