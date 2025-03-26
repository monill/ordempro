<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timezones')->insert([
            ['name' => 'UTC', 'offset' => '+00:00'],
            ['name' => 'America/New_York', 'offset' => '-05:00'],
            ['name' => 'America/Sao_Paulo', 'offset' => '-03:00'],
            ['name' => 'Europe/London', 'offset' => '+00:00'],
            ['name' => 'Asia/Tokyo', 'offset' => '+09:00'],
        ]);
    }
}
