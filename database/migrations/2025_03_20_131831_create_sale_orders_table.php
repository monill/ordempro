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
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('partner_id')->constrained('partners');
            $table->foreignId('currency_id')->constrained('currencies')->nullable();

            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('order_code')->nullable();
            $table->string('order_status');

            $table->decimal('round_off', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('grand_total', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('paid_amount', 10, 2)->default(0); // Ajuste na precisão

            $table->text('note')->nullable();

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
        Schema::dropIfExists('sale_orders');
    }
};
