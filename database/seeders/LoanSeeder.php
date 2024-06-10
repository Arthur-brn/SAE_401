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
                'loanable_type' => 'App\Models\Film',
                'loanable_id' => 2, // ID du film à emprunter
                'user_id' => 1, // ID du premier utilisateur
                'booking_number' => 'IJKL91011', // Numéro de réservation
                'start_date' => '2024-05-10', // Date de début de l'emprunt
                'status' => 'booked', // Statut de l'emprunt (réservé)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book',
                'loanable_id' => 2, // ID du livre à emprunter
                'user_id' => 2, // ID du deuxième utilisateur
                'booking_number' => 'MNOP121314', // Numéro de réservation
                'start_date' => '2024-05-15', // Date de début de l'emprunt
                'status' => 'booked', // Statut de l'emprunt (réservé)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Film',
                'loanable_id' => 3, // ID du film à emprunter
                'user_id' => 2, // ID du deuxième utilisateur
                'booking_number' => 'QRST151617', // Numéro de réservation
                'start_date' => '2024-05-20', // Date de début de l'emprunt
                'status' => 'loaned', // Statut de l'emprunt (emprunté)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book',
                'loanable_id' => 3, // ID du livre à emprunter
                'user_id' => 1, // ID du premier utilisateur
                'booking_number' => 'UVWX181920', // Numéro de réservation
                'start_date' => '2024-05-25', // Date de début de l'emprunt
                'status' => 'returned', // Statut de l'emprunt (retourné)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
