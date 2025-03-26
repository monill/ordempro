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
        Schema::create('item_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items'); // Referência para o item

            $table->string('batch_no')->nullable(); // Número do lote
            $table->string('model_no')->nullable(); // Número do modelo
            $table->string('color')->nullable(); // Cor do lote
            $table->string('size')->nullable(); // Tamanho do item
            $table->decimal('mrp', 20, 4)->default(0); // Preço máximo recomendado
            $table->date('mfg_date')->nullable(); // Data de fabricação
            $table->date('exp_date')->nullable(); // Data de validade

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_batches');
    }
};
