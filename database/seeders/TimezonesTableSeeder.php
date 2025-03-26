<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $now = Carbon::now();
        DB::table('timezones')->insert([
            ['name' => 'UTC', 'offset' => '+00:00', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'America/New_York', 'offset' => '-05:00', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'America/Sao_Paulo', 'offset' => '-03:00', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Europe/London', 'offset' => '+00:00', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Asia/Tokyo', 'offset' => '+09:00', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
