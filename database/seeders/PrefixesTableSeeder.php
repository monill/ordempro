<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prefixes')->insert([
            [
                'company_id' => 1,
                'order' => 'ORD-',
                'service' => 'SRV-',
                'job_code' => 'JOB-',
                'service_master' => 'SVC-MSTR-',
                'customer' => 'CUST-',
                'expense' => 'EXP-',
                'purchase_order' => 'PO-',
                'purchase_bill' => 'PB-',
                'purchase_return' => 'PR-',
                'sale_order' => 'SO-',
                'sale' => 'SAL-',
                'sale_return' => 'SR-',
                'stock_transfer' => 'STK-',
                'quotation' => 'QT-',
            ]
        ]);
    }
}
