<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('casting')->insert([
            [
                'film_id' => 1,
                'actor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 1,
                'actor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2,
                'actor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2, // Assurez-vous que le film avec cet ID existe
                'actor_id' => 3, // Assurez-vous que l'acteur avec cet ID existe
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
