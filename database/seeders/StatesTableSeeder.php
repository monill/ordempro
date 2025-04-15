<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            //BRA
            ['country_id' => 31, 'name' => 'Acre'],
            ['country_id' => 31, 'name' => 'Alagoas'],
            ['country_id' => 31, 'name' => 'Amapá'],
            ['country_id' => 31, 'name' => 'Amazonas'],
            ['country_id' => 31, 'name' => 'Bahia'],
            ['country_id' => 31, 'name' => 'Ceará'],
            ['country_id' => 31, 'name' => 'Distrito Federal'],
            ['country_id' => 31, 'name' => 'Espírito Santo'],
            ['country_id' => 31, 'name' => 'Goiás'],
            ['country_id' => 31, 'name' => 'Maranhão'],
            ['country_id' => 31, 'name' => 'Mato Grosso'],
            ['country_id' => 31, 'name' => 'Mato Grosso do Sul'],
            ['country_id' => 31, 'name' => 'Minas Gerais'],
            ['country_id' => 31, 'name' => 'Pará'],
            ['country_id' => 31, 'name' => 'Paraíba'],
            ['country_id' => 31, 'name' => 'Paraná'],
            ['country_id' => 31, 'name' => 'Pernambuco'],
            ['country_id' => 31, 'name' => 'Piauí'],
            ['country_id' => 31, 'name' => 'Rio de Janeiro'],
            ['country_id' => 31, 'name' => 'Rio Grande do Norte'],
            ['country_id' => 31, 'name' => 'Rio Grande do Sul'],
            ['country_id' => 31, 'name' => 'Rondônia'],
            ['country_id' => 31, 'name' => 'Roraima'],
            ['country_id' => 31, 'name' => 'Santa Catarina'],
            ['country_id' => 31, 'name' => 'São Paulo'],
            ['country_id' => 31, 'name' => 'Sergipe'],
            ['country_id' => 31, 'name' => 'Tocantins'],
            //USA
            ['country_id' => 236, 'name' => 'Alabama'],
            ['country_id' => 236, 'name' => 'Alaska'],
            ['country_id' => 236, 'name' => 'Arizona'],
            ['country_id' => 236, 'name' => 'Arkansas'],
            ['country_id' => 236, 'name' => 'California'],
            ['country_id' => 236, 'name' => 'Colorado'],
            ['country_id' => 236, 'name' => 'Connecticut'],
            ['country_id' => 236, 'name' => 'Delaware'],
            ['country_id' => 236, 'name' => 'District of Columbia'],
            ['country_id' => 236, 'name' => 'Florida'],
            ['country_id' => 236, 'name' => 'Georgia'],
            ['country_id' => 236, 'name' => 'Hawaii'],
            ['country_id' => 236, 'name' => 'Idaho'],
            ['country_id' => 236, 'name' => 'Illinois'],
            ['country_id' => 236, 'name' => 'Indiana'],
            ['country_id' => 236, 'name' => 'Iowa'],
            ['country_id' => 236, 'name' => 'Kansas'],
            ['country_id' => 236, 'name' => 'Kentucky'],
            ['country_id' => 236, 'name' => 'Louisiana'],
            ['country_id' => 236, 'name' => 'Maine'],
            ['country_id' => 236, 'name' => 'Maryland'],
            ['country_id' => 236, 'name' => 'Massachusetts'],
            ['country_id' => 236, 'name' => 'Michigan'],
            ['country_id' => 236, 'name' => 'Minnesota'],
            ['country_id' => 236, 'name' => 'Mississippi'],
            ['country_id' => 236, 'name' => 'Missouri'],
            ['country_id' => 236, 'name' => 'Montana'],
            ['country_id' => 236, 'name' => 'Nebraska'],
            ['country_id' => 236, 'name' => 'Nevada'],
            ['country_id' => 236, 'name' => 'New Hampshire'],
            ['country_id' => 236, 'name' => 'New Jersey'],
            ['country_id' => 236, 'name' => 'New Mexico'],
            ['country_id' => 236, 'name' => 'New York'],
            ['country_id' => 236, 'name' => 'North Carolina'],
            ['country_id' => 236, 'name' => 'North Dakota'],
            ['country_id' => 236, 'name' => 'Ohio'],
            ['country_id' => 236, 'name' => 'Oklahoma'],
            ['country_id' => 236, 'name' => 'Oregon'],
            ['country_id' => 236, 'name' => 'Pennsylvania'],
            ['country_id' => 236, 'name' => 'Rhode Island'],
            ['country_id' => 236, 'name' => 'South Carolina'],
            ['country_id' => 236, 'name' => 'South Dakota'],
            ['country_id' => 236, 'name' => 'Tennessee'],
            ['country_id' => 236, 'name' => 'Texas'],
            ['country_id' => 236, 'name' => 'Utah'],
            ['country_id' => 236, 'name' => 'Vermont'],
            ['country_id' => 236, 'name' => 'Virginia'],
            ['country_id' => 236, 'name' => 'Washington'],
            ['country_id' => 236, 'name' => 'West Virginia'],
            ['country_id' => 236, 'name' => 'Wisconsin'],
            ['country_id' => 236, 'name' => 'Wyoming'],

        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
