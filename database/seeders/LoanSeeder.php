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
                'loanable_id' => 1,
                'user_id' => 1,
                'booking_number' => 'ABCD1234',
                'start_date' => '2024-05-01',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book',
                'loanable_id' => 1,
                'user_id' => 2,
                'booking_number' => 'EFGH5678',
                'start_date' => '2024-05-05',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
