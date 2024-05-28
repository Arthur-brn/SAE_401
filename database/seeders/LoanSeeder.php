<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan')->insert([
            [
                'loanable_type' => 'App\Models\Film', // Assurez-vous de remplacer le chemin de classe par celui de votre modèle de film
                'loanable_id' => 1, // Assurez-vous que le film avec cet ID existe
                'user_id' => 1, // Assurez-vous que l'utilisateur avec cet ID existe
                'booking_number' => 'ABCD1234',
                'start_date' => '2024-05-01',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book', // Assurez-vous de remplacer le chemin de classe par celui de votre modèle de livre
                'loanable_id' => 1, // Assurez-vous que le livre avec cet ID existe
                'user_id' => 2, // Assurez-vous que l'utilisateur avec cet ID existe
                'booking_number' => 'EFGH5678',
                'start_date' => '2024-05-05',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
