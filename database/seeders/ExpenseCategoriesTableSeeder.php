<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Aluguel', 'description' => 'Despesas com aluguel de imóveis', 'is_enabled' => true],
            ['name' => 'Salários', 'description' => 'Pagamentos de salários dos colaboradores', 'is_enabled' => true],
            ['name' => 'Suprimentos', 'description' => 'Despesas com materiais de escritório e consumo', 'is_enabled' => true],
            ['name' => 'Viagens', 'description' => 'Despesas com viagens corporativas', 'is_enabled' => true],
            ['name' => 'Marketing', 'description' => 'Despesas com ações de marketing e publicidade', 'is_enabled' => true],
            ['name' => 'Serviços terceirizados', 'description' => 'Pagamento a prestadores de serviços terceirizados', 'is_enabled' => true],
        ];

        foreach ($categories as $category) {
            ExpenseCategory::create($category);
        }
    }
}
