<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('countries')->insert([
            ['code' => 'USA', 'name' => 'United States', 'phone_code' => '+1', 'currency_code' => 'USD', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'BRA', 'name' => 'Brazil', 'phone_code' => '+55', 'currency_code' => 'BRL', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'GBR', 'name' => 'United Kingdom', 'phone_code' => '+44', 'currency_code' => 'GBP', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'CAN', 'name' => 'Canada', 'phone_code' => '+1', 'currency_code' => 'CAD', 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'FRA', 'name' => 'France', 'phone_code' => '+33', 'currency_code' => 'EUR', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
