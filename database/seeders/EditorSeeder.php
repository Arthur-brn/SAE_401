<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editor')->insert([
            [
                'name' => 'Penguin Random House',
                'picture' => 'penguin_random_house.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HarperCollins',
                'picture' => 'harper_collins.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simon & Schuster',
                'picture' => 'simon_schuster.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
