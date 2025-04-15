<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['code' => 'en-us', 'name' => 'English (United States)', 'direction' => 'ltr', 'icon' => 'flag-icon-us', 'is_enabled' => true],
            ['code' => 'pt-br', 'name' => 'Portuguese (Brazil)', 'direction' => 'ltr', 'icon' => 'flag-icon-br', 'is_enabled' => true]
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
