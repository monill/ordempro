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
        Schema::create('item_batch_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items'); // Item relacionado à transação
            $table->foreignId('item_transaction_id')->constrained('item_transactions'); // Transação principal do item (ex: venda, compra, ajuste)
            $table->foreignId('item_batch_id')->constrained('item_batches'); // Lote específico envolvido na transação
            $table->foreignId('warehouse_id')->constrained('warehouses'); // Armazém onde a movimentação ocorreu

            $table->string('unique_code'); // Código único da transação (para rastreio)
            $table->decimal('quantity', 8, 4)->default(0); // Quantidade movimentada do lote

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_batch_transactions');
    }
};
