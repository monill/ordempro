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
            CompaniesTableSeeder::class,
            CountriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            ExpenseCategoriesTableSeeder::class,
            GendersTableSeeder::class,
            ItemCategoriesTableSeeder::class,
            LanguagesTableSeeder::class,
            PaymentTypesTableSeeder::class,
            PhoneTypesTableSeeder::class,
            PrefixesTableSeeder::class,
            SettingsTableSeeder::class,
            TaxesTableSeeder::class,
            TimezonesTableSeeder::class,
            UnitsTableSeeder::class,
            UsersTableSeeder::class,
            WarehousesTableSeeder::class,
        ]);
    }
}
