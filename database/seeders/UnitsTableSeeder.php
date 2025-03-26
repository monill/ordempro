<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('units')->insert([
            ['name' => 'None', 'short_code' => 'None', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Box', 'short_code' => 'Box', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pieces', 'short_code' => 'Pcs', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bag', 'short_code' => 'Bag', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bottle', 'short_code' => 'Btl', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kilogram', 'short_code' => 'Kg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gram', 'short_code' => 'g', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Liter', 'short_code' => 'L', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Meter', 'short_code' => 'm', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Centimeter', 'short_code' => 'cm', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Millimeter', 'short_code' => 'mm', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pack', 'short_code' => 'Pk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dozen', 'short_code' => 'Dz', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ton', 'short_code' => 'T', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pair', 'short_code' => 'Pr', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
