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
                'loanable_id' => 2,
                'user_id' => 1,
                'booking_number' => 'IJKL91011',
                'start_date' => '2024-05-10',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book',
                'loanable_id' => 2,
                'user_id' => 2,
                'booking_number' => 'MNOP121314',
                'start_date' => '2024-05-15',
                'status' => 'booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Film',
                'loanable_id' => 3,
                'user_id' => 2,
                'booking_number' => 'QRST151617',
                'start_date' => '2024-05-20',
                'status' => 'loaned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loanable_type' => 'App\Models\Book',
                'loanable_id' => 3,
                'user_id' => 1,
                'booking_number' => 'UVWX181920',
                'start_date' => '2024-05-25',
                'status' => 'returned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
