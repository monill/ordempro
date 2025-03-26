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

            $table->foreignId('partner_id')->constrained('partners'); // Relacionamento com a tabela de 'partners' (fornecedores, clientes, etc)
            $table->foreignId('currency_id')->constrained('currencies')->nullable(); // Relacionamento com a tabela de moedas

            // Códigos para identificação do pedido
            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('order_code')->nullable();

            // Status do pedido
            $table->string('order_status'); // Status do pedido (Ex: 'Pending', 'Completed')

            // Valores financeiros
            $table->decimal('round_off', 10, 2)->default(0); // Arredondamento
            $table->decimal('grand_total', 10, 2)->default(0); // Total após ajustes
            $table->decimal('paid_amount', 10, 2)->default(0); // Pagamento realizado

            // Observações
            $table->text('note')->nullable();

            // Data do pedido e data de vencimento
            $table->date('order_date');
            $table->date('due_date')->nullable();

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
