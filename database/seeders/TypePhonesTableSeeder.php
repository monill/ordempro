<?php

namespace Database\Seeders;

use App\Models\TypePhone;
use Illuminate\Database\Seeder;

class TypePhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phones = [
            ['name' => 'Celular'],
            ['name' => 'Comercial'],
            ['name' => 'Residencial'],
            ['name' => 'WhatsApp'],
            ['name' => 'Suporte'],
        ];

        foreach ($phones as $phone) {
            TypePhone::create($phone);
        }
    }
}
