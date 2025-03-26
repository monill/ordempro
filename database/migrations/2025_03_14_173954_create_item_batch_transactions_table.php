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

            $table->foreignId('item_id')->constrained('items'); // Transações dos itens
            $table->foreignId('item_transaction_id')->constrained('item_transactions'); // Transações dos itens
            $table->foreignId('item_batch_id')->constrained('item_batches'); // Relacionamento com o lote
            $table->foreignId('warehouse_id')->constrained('warehouses'); // Armazém relacionado à transação

            $table->string('unique_code');
            $table->decimal('quantity', 20, 4)->default(0); // Quantidade do item

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
