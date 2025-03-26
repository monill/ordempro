<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('expense_categories')->insert([
            ['name' => 'Aluguel', 'description' => 'Despesas com aluguel de imóveis', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Salários', 'description' => 'Pagamentos de salários dos colaboradores', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Suprimentos', 'description' => 'Despesas com materiais de escritório e consumo', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Viagens', 'description' => 'Despesas com viagens corporativas', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing', 'description' => 'Despesas com ações de marketing e publicidade', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Serviços terceirizados', 'description' => 'Pagamento a prestadores de serviços terceirizados', 'is_enabled' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
