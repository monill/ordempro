<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            TimezonesTableSeeder::class,
            SettingsTableSeeder::class,
            LanguagesTableSeeder::class,
            TypeAddressesTableSeeder::class,
            TypePaymentsTableSeeder::class,
            TypePhonesTableSeeder::class,
            GendersTableSeeder::class,
            CompaniesTableSeeder::class,
            TaxesTableSeeder::class,
            WarehousesTableSeeder::class,
            PrefixesTableSeeder::class,
            UnitsTableSeeder::class,
            ItemCategoriesTableSeeder::class,
            ExpenseCategoriesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
