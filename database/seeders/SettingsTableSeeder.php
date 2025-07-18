<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('settings')->insert(['name' => 'app_name', 'value' => 'OrdemPro', 'created_at' => $now, 'updated_at' => $now]);
    }
}
