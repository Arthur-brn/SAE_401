<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'address' => '123 Main St, Anytown, USA',
                'birthday' => '1985-06-15',
                'status' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'address' => '456 Elm St, Othertown, USA',
                'birthday' => '1990-07-20',
                'status' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminpassword'),
                'address' => '789 Oak St, Admin City, USA',
                'birthday' => '1975-08-25',
                'status' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
