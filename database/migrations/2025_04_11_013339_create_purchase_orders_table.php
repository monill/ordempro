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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners'); // Fornecedor relacionado

            // Códigos de identificação
            $table->string('prefix_code', 50)->nullable(); // Prefixo para código do pedido
            $table->string('count_id', 50)->nullable();    // Identificador incremental
            $table->string('order_code', 50)->nullable();  // Código completo do pedido

            // Status do pedido (pode usar enum se preferir)
            $table->string('order_status'); // Ex: 'Pending', 'Completed'

            // Valores financeiros
            $table->decimal('round_off', 8, 4)->default(0);    // Arredondamento
            $table->decimal('grand_total', 8, 4)->default(0);  // Total final
            $table->decimal('paid_amount', 8, 4)->default(0);  // Valor pago

            $table->text('note')->nullable(); // Observações

            $table->date('order_date'); // Data do pedido
            $table->date('due_date')->nullable(); // Data de vencimento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
