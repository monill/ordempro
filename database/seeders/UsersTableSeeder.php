<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            'username' => 'admin',
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => $now,
            'password' => Hash::make('123123'),
            'access_all_warehouses' => true,
            'is_enabled' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
