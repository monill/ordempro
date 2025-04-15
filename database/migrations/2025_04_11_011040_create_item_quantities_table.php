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
        Schema::create('item_quantities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items'); // Referência ao item
            $table->foreignId('warehouse_id')->constrained('warehouses'); // Armazém onde o item está armazenado

            $table->decimal('quantity', 8, 4)->default(0); // Quantidade disponível do item nesse armazém

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_quantities');
    }
};
