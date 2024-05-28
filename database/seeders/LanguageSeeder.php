<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language')->insert([
            [
                'name' => 'English',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spanish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'French',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'German',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chinese',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
