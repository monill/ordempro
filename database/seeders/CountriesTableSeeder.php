<?php

namespace Database\Seeders;

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
        DB::table('countries')->insert([
            ['code' => 'USA', 'name' => 'United States', 'phone_code' => '+1', 'currency_code' => 'USD'],
            ['code' => 'BRA', 'name' => 'Brazil', 'phone_code' => '+55', 'currency_code' => 'BRL'],
            ['code' => 'GBR', 'name' => 'United Kingdom', 'phone_code' => '+44', 'currency_code' => 'GBP'],
            ['code' => 'CAN', 'name' => 'Canada', 'phone_code' => '+1', 'currency_code' => 'CAD'],
            ['code' => 'FRA', 'name' => 'France', 'phone_code' => '+33', 'currency_code' => 'EUR'],
        ]);
    }
}
