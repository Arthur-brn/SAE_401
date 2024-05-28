<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorSeeder::class);
        $this->call(EditorSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(FilmSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(LoanSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(AudioLanguageSeeder::class);
        $this->call(SubtitleSeeder::class);
        $this->call(CastingSeeder::class);
    }
}
