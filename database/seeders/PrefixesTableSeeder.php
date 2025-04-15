<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Seeder;

class PrefixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefixes = [
            ['company_id' => 1, 'order' => 'ORD-', 'service' => 'SRV-', 'job_code' => 'JOB-', 'service_master' => 'SVC-MSTR-', 'customer' => 'CUST-', 'expense' => 'EXP-', 'purchase_order' => 'PO-', 'purchase_bill' => 'PB-', 'purchase_return' => 'PR-', 'sale_order' => 'SO-', 'sale' => 'SAL-', 'sale_return' => 'SR-', 'stock_transfer' => 'STK-', 'quotation' => 'QT-']
        ];

        foreach ($prefixes as $prefix) {
            Prefix::create($prefix);
        }
    }
}
