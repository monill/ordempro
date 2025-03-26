<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('genders')->insert([
            ['name' => 'Indefinido', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Feminino', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Masculino', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
