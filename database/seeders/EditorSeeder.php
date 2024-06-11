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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HarperCollins',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simon & Schuster',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
