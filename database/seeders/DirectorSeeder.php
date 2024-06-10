<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('director')->insert([
            [
                'name' => 'Steven Spielberg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Christopher Nolan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quentin Tarantino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
