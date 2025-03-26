<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $now = Carbon::now();
        DB::table('address_types')->insert([
            ['name' => 'Residencial', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comercial', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Faturamento', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Entrega', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Correspondência', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cobrança', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
