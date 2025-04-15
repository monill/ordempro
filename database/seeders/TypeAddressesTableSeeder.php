<?php

namespace Database\Seeders;

use App\Models\TypeAddress;
use Illuminate\Database\Seeder;

class TypeAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['name' => 'Residencial'],
            ['name' => 'Comercial'],
            ['name' => 'Faturamento'],
            ['name' => 'Entrega'],
            ['name' => 'Correspondência'],
            ['name' => 'Cobrança'],
        ];

        foreach ($addresses as $address) {
            TypeAddress::create($address);
        }
    }
}
