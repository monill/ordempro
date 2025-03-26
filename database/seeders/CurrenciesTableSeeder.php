<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('currencies')->insert([
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'exchange_rate' => 1.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'BRL', 'name' => 'Brazilian Real', 'symbol' => 'R$', 'exchange_rate' => 5.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'exchange_rate' => 0.92, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£', 'exchange_rate' => 0.78, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'CAD', 'name' => 'Canadian Dollar', 'symbol' => 'C$', 'exchange_rate' => 1.35, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
