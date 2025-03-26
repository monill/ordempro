<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $now = Carbon::now();
        DB::table('taxes')->insert([
            ['name' => 'Nenhum', 'rate' => 0, 'is_inclusive' => false, 'is_enabled' => true,  'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'VAT', 'rate' => 20.00, 'is_inclusive' => true, 'is_enabled' => true,  'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'ICMS', 'rate' => 18.00, 'is_inclusive' => false, 'is_enabled' => true,  'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'ISS', 'rate' => 5.00, 'is_inclusive' => false, 'is_enabled' => true,  'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'GST', 'rate' => 10.00, 'is_inclusive' => true, 'is_enabled' => true,  'created_at' => $now, 'updated_at' => $now,],
        ]);
    }
}
