<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudioLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audio_language')->insert([
            [
                'film_id' => 1,
                'language_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 1,
                'language_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2,
                'language_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2,
                'language_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
