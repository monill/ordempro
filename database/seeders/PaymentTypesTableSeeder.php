<?php

namespace Database\Seeders;

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
        DB::table('payment_types')->insert([
            ['name' => 'Cartão de Crédito', 'code' => 'credit_card', 'is_enabled' => true],
            ['name' => 'Cartão de Débito', 'code' => 'debit_card', 'is_enabled' => true],
            ['name' => 'Pix', 'code' => 'pix', 'is_enabled' => true],
            ['name' => 'Boleto Bancário', 'code' => 'boleto', 'is_enabled' => true],
            ['name' => 'Dinheiro', 'code' => 'cash', 'is_enabled' => true],
            ['name' => 'Cheque', 'code' => 'cheque', 'is_enabled' => true],
            ['name' => 'Transferência Bancária', 'code' => 'bank_transfer', 'is_enabled' => true],
        ]);
    }
}
