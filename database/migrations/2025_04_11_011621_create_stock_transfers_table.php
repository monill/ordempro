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
        Schema::create('stock_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('prefix_code')->nullable(); // Código do prefixo, se estiver usando controle de prefixos (ex: ST-0001)
            $table->string('count_id')->nullable(); // Pode ser um contador auxiliar ou ID de referência para agrupamentos
            $table->string('transfer_code')->nullable(); // Código único da transferência
            $table->text('note')->nullable(); // Observações gerais sobre a transferência
            $table->date('transfer_date'); // Data da transferência

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transfers');
    }
};
