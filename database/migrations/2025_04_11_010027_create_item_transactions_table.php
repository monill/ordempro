<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained('items'); // Item relacionado
            $table->foreignId('unit_id')->constrained('units'); // Unidade utilizada na transação
            $table->foreignId('tax_id')->constrained('taxes'); // Imposto aplicado
            $table->foreignId('warehouse_id')->constrained('warehouses'); // Local do estoque (depósito/armazém)

            $table->morphs('transaction'); // Gera transaction_id e transaction_type (relacionamento polimórfico: ex. vendas, compras)

            $table->string('unique_code'); // Código único da transação (ex: para rastreamento)
            $table->string('tracking_type'); // Tipo de rastreio (serial, lote, etc.)
            $table->text('description')->nullable(); // Observações ou detalhes extras

            $table->decimal('mrp', 8, 4)->default(0); // Preço máximo ao consumidor (por unidade)
            $table->decimal('quantity', 8, 4)->default(0); // Quantidade movimentada

            $table->decimal('unit_price', 8, 4)->default(0); // Preço unitário (pode incluir ou não imposto)

            $table->decimal('discount', 8, 4)->default(0); // Porcentagem ou valor do desconto
            $table->decimal('discount_amount', 8, 4)->default(0); // Valor calculado do desconto
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage'); // Tipo do desconto: percentage ou fixed

            $table->string('tax_type')->default('inclusive'); // Tipo do imposto: inclusive ou exclusive
            $table->decimal('tax_amount', 8, 4)->default(0); // Valor total de imposto aplicado

            $table->decimal('total', 8, 4)->default(0)->comment('Total final, incluindo descontos e impostos'); // Total final da linha

            $table->date('transaction_date'); // Data da transação
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_transactions');
    }
};
