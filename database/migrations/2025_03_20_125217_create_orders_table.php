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

            $table->foreignId('partner_id')->constrained('partners')->nullable();

            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('order_code')->nullable();

            $table->enum('order_status', ['pending', 'completed', 'canceled', 'shipped', 'delivered'])->nullable(); // Status do pedido

            // Valores numéricos, ajustados para 2 casas decimais
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2)->default(0);

            // Status do pagamento
            $table->enum('payment_status', ['paid', 'pending', 'partially_paid'])->nullable();

            $table->text('note')->nullable();
            $table->text('schedule_note')->nullable();

            $table->date('order_date');
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
