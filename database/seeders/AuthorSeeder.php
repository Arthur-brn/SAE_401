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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'George R.R. Martin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'J.R.R. Tolkien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
