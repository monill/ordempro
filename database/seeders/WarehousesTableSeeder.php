<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('warehouses')->insert([
            'name' => 'Principal', 'created_at' => $now, 'updated_at' => $now
        ]);

        DB::table('company_warehouse')->insert([
            'company_id' => 1, 'warehouse_id' => 1, 'created_at' => $now, 'updated_at' => $now
        ]);

        DB::table('user_warehouses')->insert([
            'user_id' => 1, 'warehouse_id' => 1
        ]);
    }
}
