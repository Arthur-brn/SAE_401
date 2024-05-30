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
                'picture' => 'leonardo_dicaprio.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meryl Streep',
                'picture' => 'meryl_streep.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Denzel Washington',
                'picture' => 'denzel_washington.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
