<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('languages')->insert([
            ['code' => 'en-us', 'name' => 'English (United States)', 'direction' => 'ltr', 'icon' => 'flag-icon-us', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'pt-br', 'name' => 'Portuguese (Brazil)', 'direction' => 'ltr', 'icon' => 'flag-icon-br', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
