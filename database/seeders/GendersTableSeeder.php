<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['name' => 'Indefinido'],
            ['name' => 'Feminino'],
            ['name' => 'Masculino']
        ];

        foreach ($genders as $gender) {
            Gender::create($gender);
        }
    }
}
