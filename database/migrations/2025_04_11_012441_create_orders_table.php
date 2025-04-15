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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners')->nullable(); // Cliente associado ao pedido (pode ser nulo)

            $table->string('prefix_code', 50)->nullable(); // Prefixo do código do pedido (ex: OR-)
            $table->string('count_id')->nullable(); // Identificador sequencial (ex: 0001, 0002)
            $table->string('order_code', 50)->nullable(); // Código completo do pedido (prefixo + número)

            $table->enum('order_status', ['pending', 'completed', 'canceled', 'shipped', 'delivered'])->nullable(); // Status do pedido

            // Valores numéricos do pedido
            $table->decimal('total_amount', 8, 4)->default(0); // Valor total do pedido
            $table->decimal('paid_amount', 8, 4)->default(0); // Valor pago

            $table->enum('payment_status', ['paid', 'pending', 'partially_paid'])->nullable(); // Status do pagamento

            $table->text('note')->nullable(); // Observações gerais do pedido
            $table->text('schedule_note')->nullable(); // Observações sobre o agendamento (ex: entrega futura)

            $table->date('order_date'); // Data do pedido

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
