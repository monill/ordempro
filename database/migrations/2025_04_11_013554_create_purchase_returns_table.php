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
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners'); // Fornecedor relacionado
            //$table->foreignId('currency_id')->nullable()->constrained('currencies'); // Moeda usada na transação (opcional)

            // Identificadores e referências
            $table->string('prefix_code', 50)->nullable();  // Prefixo do código
            $table->string('count_id', 50)->nullable();     // ID incremental
            $table->string('return_code', 50)->nullable();  // Código do retorno
            $table->string('reference_no', 50)->nullable(); // Número de referência (ex: número da compra original)

            // Valores financeiros
            $table->decimal('round_off', 8, 4)->default(0);    // Arredondamento
            $table->decimal('grand_total', 8, 4)->default(0);  // Total da devolução
            $table->decimal('paid_amount', 8, 4)->default(0);  // Valor reembolsado/pago

            // Status da devolução
            $table->enum('return_status', ['pending', 'approved', 'rejected', 'partial'])->default('pending');

            $table->text('note')->nullable(); // Observações ou motivos da devolução
            $table->date('return_date'); // Data em que a devolução foi feita
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_returns');
    }
};
