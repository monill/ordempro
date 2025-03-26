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
        Schema::create('item_batch_quantities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('item_batch_id')->constrained('item_batches'); // Referência para o lote
            $table->foreignId('warehouse_id')->constrained('warehouses'); // Relacionamento com o armazém

            $table->decimal('quantity', 20, 4)->default(0); // Quantidade disponível no armazém
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_batch_quantities');
    }
};
