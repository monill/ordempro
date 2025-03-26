<?php

namespace Database\Seeders;

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
        DB::table('languages')->insert([
            ['code' => 'en-us', 'name' => 'English (United States)', 'direction' => 'ltr', 'icon' => 'flag-icon-us', 'is_enabled' => true],
            ['code' => 'pt-br', 'name' => 'Portuguese (Brazil)', 'direction' => 'ltr', 'icon' => 'flag-icon-br', 'is_enabled' => true]
        ]);
    }
}
