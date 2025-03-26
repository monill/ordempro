<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('phone_types')->insert([
            ['name' => 'Celular', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comercial', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Residencial', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'WhatsApp', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Suporte', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
