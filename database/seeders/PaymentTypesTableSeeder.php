<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('payment_types')->insert([
            ['name' => 'Cartão de Crédito', 'code' => 'credit_card', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cartão de Débito', 'code' => 'debit_card', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pix', 'code' => 'pix', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Boleto Bancário', 'code' => 'boleto', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dinheiro', 'code' => 'cash', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cheque', 'code' => 'cheque', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Transferência Bancária', 'code' => 'bank_transfer', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
