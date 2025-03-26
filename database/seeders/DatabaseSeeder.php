<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AddressTypesTableSeeder::class,
            CountriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            ExpenseCategoriesTableSeeder::class,
            GendersTableSeeder::class,
            LanguagesTableSeeder::class,
            PaymentTypesTableSeeder::class,
            PhoneTypesTableSeeder::class,
            PrefixesTableSeeder::class,
            TaxesTableSeeder::class,
            TimezonesTableSeeder::class,
            UnitsTableSeeder::class,
        ]);
    }
}
