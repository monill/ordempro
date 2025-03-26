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

            $table->foreignId('partner_id')->constrained('partners'); // Relacionamento com a tabela de 'partners' (fornecedores, clientes, etc)
            $table->foreignId('currency_id')->constrained('currencies')->nullable(); // Relacionamento com a tabela de moedas

            // Códigos e referências
            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('return_code')->nullable();
            $table->string('reference_no')->nullable(); // Número de referência, caso aplicável

            // Valores financeiros
            $table->decimal('round_off', 10, 2)->default(0); // Arredondamento
            $table->decimal('grand_total', 10, 2)->default(0); // Total após ajustes
            $table->decimal('paid_amount', 10, 2)->default(0); // Pagamento realizado

            // Observações adicionais
            $table->text('note')->nullable();

            // Data do retorno
            $table->date('return_date');

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
