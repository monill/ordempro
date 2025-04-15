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
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders'); // Relação com o pedido
            $table->foreignId('payment_type_id')->constrained('type_payments'); // Tipo de pagamento (ex: dinheiro, cartão, transferência)

            $table->string('transaction_id')->nullable()->comment('Transaction ID for online payments'); // ID de transação (para pagamentos online)
            $table->decimal('amount', 8, 4)->default(0); // Valor pago neste pagamento
            $table->enum('status', ['pending', 'paid', 'failed'])->nullable(); // Status do pagamento (pendente, pago ou falhou)
            $table->text('note')->nullable(); // Observações adicionais (ex: referência bancária)

            $table->date('payment_date'); // Data do pagamento
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payments');
    }
};
