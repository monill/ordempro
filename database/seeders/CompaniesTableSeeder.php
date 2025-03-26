<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('companies')->insert([
            'name' => 'Joao App',
            'date_format' => 'd-m-Y',
            'time_format' => '24',
            'timezone' => 'America/Sao_Paulo',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
