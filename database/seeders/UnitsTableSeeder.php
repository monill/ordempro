<?php

namespace Database\Seeders;

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
        DB::table('units')->insert([
            ['name' => 'None', 'short_code' => 'None'],
            ['name' => 'Box', 'short_code' => 'Box'],
            ['name' => 'Pieces', 'short_code' => 'Pcs'],
            ['name' => 'Bag', 'short_code' => 'Bag'],
            ['name' => 'Bottle', 'short_code' => 'Btl'],
            ['name' => 'Kilogram', 'short_code' => 'Kg'],
            ['name' => 'Gram', 'short_code' => 'g'],
            ['name' => 'Liter', 'short_code' => 'L'],
            ['name' => 'Meter', 'short_code' => 'm'],
            ['name' => 'Centimeter', 'short_code' => 'cm'],
            ['name' => 'Millimeter', 'short_code' => 'mm'],
            ['name' => 'Pack', 'short_code' => 'Pk'],
            ['name' => 'Dozen', 'short_code' => 'Dz'],
            ['name' => 'Ton', 'short_code' => 'T'],
            ['name' => 'Pair', 'short_code' => 'Pr']
        ]);
    }
}
