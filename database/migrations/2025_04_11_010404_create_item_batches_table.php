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
            $table->foreignId('item_id')->constrained('items'); // Item ao qual o lote pertence

            $table->string('batch_no')->nullable(); // Número do lote (pode ser fornecido pelo fabricante ou gerado internamente)
            $table->string('model_no')->nullable(); // Código ou número do modelo (ex: para eletrônicos ou peças)
            $table->string('color')->nullable(); // Cor do lote (ex: roupas, tintas, etc.)
            $table->string('size')->nullable(); // Tamanho do lote (ex: calçados, roupas, embalagens)

            $table->decimal('mrp', 8, 4)->default(0); // Preço máximo sugerido ao consumidor (MRP - Maximum Retail Price)

            $table->date('mfg_date')->nullable(); // Data de fabricação do lote
            $table->date('exp_date')->nullable(); // Data de validade (usado para alimentos, medicamentos, etc.)

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
