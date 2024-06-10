<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actor')->insert([
            [
                'name' => 'Leonardo DiCaprio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meryl Streep',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Denzel Washington',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
