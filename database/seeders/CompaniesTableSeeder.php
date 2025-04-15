<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Joao App',
                'date_format' => 'd/m/Y',
                'time_format' => '24'
            ]
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
