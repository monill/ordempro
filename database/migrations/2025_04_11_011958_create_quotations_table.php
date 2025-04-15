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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners'); // Cliente (ou fornecedor, se for o caso) vinculado à cotação

            $table->string('prefix_code')->nullable(); // Prefixo do código, ex: QTN-2025
            $table->string('count_id')->nullable(); // Contador sequencial interno (separado por empresa, por exemplo)
            $table->string('quotation_code')->nullable(); // Código completo da cotação
            $table->string('quotation_status'); // Status da cotação: draft, sent, approved, rejected, etc.

            $table->decimal('round_off', 8, 4)->default(0); // Arredondamento aplicado no total
            $table->decimal('grand_total', 8, 4)->default(0); // Valor total da cotação
            $table->decimal('paid_amount', 8, 4)->default(0); // Valor pago (em caso de adiantamento, por exemplo)
            $table->decimal('exchange_rate', 8, 4)->default(0); // Taxa de câmbio (se for usado em moeda estrangeira)

            $table->text('note')->nullable(); // Observações adicionais

            $table->softDeletes(); // Permite exclusão lógica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
