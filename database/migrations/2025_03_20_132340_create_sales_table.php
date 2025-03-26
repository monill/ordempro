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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sale_order_id')->constrained('sale_orders')->nullable(); // Especificação da tabela
            $table->foreignId('quotation_id')->constrained('quotations')->nullable(); // Especificação da tabela
            $table->foreignId('partner_id')->constrained('partners'); // Especificação da tabela
            $table->foreignId('currency_id')->constrained('currencies')->nullable(); // Especificação da tabela

            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('sale_code')->nullable();
            $table->string('reference_no')->nullable();

            $table->decimal('round_off', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('grand_total', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('paid_amount', 10, 2)->default(0); // Ajuste na precisão

            $table->text('note')->nullable();

            $table->date('sale_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
