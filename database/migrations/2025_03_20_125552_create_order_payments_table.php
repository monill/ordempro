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
            $table->foreignId('payment_type_id')->constrained('payment_types'); // Relação com o tipo de pagamento

            $table->string('transaction_id')->nullable()->comment('Transaction ID for online payments'); // ID de transação (usado para pagamentos online)
            $table->decimal('amount', 10, 2)->default(0); // Quantia paga, com duas casas decimais
            $table->enum('status', ['pending', 'paid', 'failed'])->nullable(); // Status do pagamento
            $table->text('note')->nullable(); // Notas sobre o pagamento

            $table->date('payment_date');
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
