<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['company_id' => 1, 'name' => 'None', 'short_code' => 'None'],
            ['company_id' => 1, 'name' => 'Box', 'short_code' => 'Box'],
            ['company_id' => 1, 'name' => 'Pieces', 'short_code' => 'Pcs'],
            ['company_id' => 1, 'name' => 'Bag', 'short_code' => 'Bag'],
            ['company_id' => 1, 'name' => 'Bottle', 'short_code' => 'Btl'],
            ['company_id' => 1, 'name' => 'Kilogram', 'short_code' => 'Kg'],
            ['company_id' => 1, 'name' => 'Gram', 'short_code' => 'g'],
            ['company_id' => 1, 'name' => 'Liter', 'short_code' => 'L'],
            ['company_id' => 1, 'name' => 'Meter', 'short_code' => 'm'],
            ['company_id' => 1, 'name' => 'Centimeter', 'short_code' => 'cm'],
            ['company_id' => 1, 'name' => 'Millimeter', 'short_code' => 'mm'],
            ['company_id' => 1, 'name' => 'Pack', 'short_code' => 'Pk'],
            ['company_id' => 1, 'name' => 'Dozen', 'short_code' => 'Dz'],
            ['company_id' => 1, 'name' => 'Ton', 'short_code' => 'T'],
            ['company_id' => 1, 'name' => 'Pair', 'short_code' => 'Pr']
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
