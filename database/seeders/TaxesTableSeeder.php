<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxes = [
            ['company_id' => 1, 'name' => 'Nenhum', 'rate' => 0, 'is_inclusive' => false, 'is_enabled' => true],
            ['company_id' => 1, 'name' => 'VAT', 'rate' => 20.00, 'is_inclusive' => true, 'is_enabled' => true],
            ['company_id' => 1, 'name' => 'ICMS', 'rate' => 18.00, 'is_inclusive' => false, 'is_enabled' => true],
            ['company_id' => 1, 'name' => 'ISS', 'rate' => 5.00, 'is_inclusive' => false, 'is_enabled' => true],
            ['company_id' => 1, 'name' => 'GST', 'rate' => 10.00, 'is_inclusive' => true, 'is_enabled' => true],
        ];

        foreach ($taxes as $tax) {
            Tax::create($tax);
        }
    }
}
