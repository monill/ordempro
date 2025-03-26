<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('address_types')->insert([
            ['name' => 'Residencial'],
            ['name' => 'Faturamento'],
            ['name' => 'Entrega'],
            ['name' => 'Correspondência'],
            ['name' => 'Cobrança'],
            ['name' => 'Residencial'],
            ['name' => 'Comercial'],
        ]);
    }
}
