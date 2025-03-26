<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taxes')->insert([
            ['name' => 'VAT', 'rate' => 20.00, 'is_inclusive' => true, 'is_enabled' => true],
            ['name' => 'ICMS', 'rate' => 18.00, 'is_inclusive' => false, 'is_enabled' => true],
            ['name' => 'ISS', 'rate' => 5.00, 'is_inclusive' => false, 'is_enabled' => true],
            ['name' => 'GST', 'rate' => 10.00, 'is_inclusive' => true, 'is_enabled' => true],
        ]);
    }
}
