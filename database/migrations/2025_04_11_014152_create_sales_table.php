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
            $table->foreignId('sale_order_id')->nullable()->constrained('sale_orders');
            $table->foreignId('quotation_id')->nullable()->constrained('quotations');
            $table->foreignId('partner_id')->constrained('partners');
            //$table->foreignId('currency_id')->nullable()->constrained('currencies');

            $table->string('prefix_code', 50)->nullable();
            $table->string('count_id', 50)->nullable();
            $table->string('sale_code', 50)->nullable();
            $table->string('reference_no', 50)->nullable();

            $table->enum('sale_status', ['pending', 'completed', 'canceled', 'returned'])->default('pending');

            $table->decimal('round_off', 8, 4)->default(0);
            $table->decimal('grand_total', 8, 4)->default(0);
            $table->decimal('paid_amount', 8, 4)->default(0);

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
