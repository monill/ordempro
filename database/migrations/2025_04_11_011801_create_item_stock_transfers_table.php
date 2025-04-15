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
        Schema::create('item_stock_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_transfer_id')->constrained('stock_transfers'); // Referência à transferência de estoque principal
            $table->foreignId('item_id')->constrained('items'); // Item transferido
            $table->foreignId('from_warehouse_id')->constrained('warehouses'); // Armazém de origem
            $table->foreignId('to_warehouse_id')->constrained('warehouses'); // Armazém de destino
            $table->foreignId('from_item_transaction_id')->constrained('item_transactions'); // Transação de saída
            $table->foreignId('to_item_transaction_id')->constrained('item_transactions'); // Transação de entrada

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_stock_transfers');
    }
};
