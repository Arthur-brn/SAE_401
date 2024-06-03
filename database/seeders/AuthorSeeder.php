<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author')->insert([
            [
                'name' => 'J.K. Rowling',
                'picture' => 'jk_rowling.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'George R.R. Martin',
                'picture' => 'george_rr_martin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'J.R.R. Tolkien',
                'picture' => 'jrr_tolkien.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
