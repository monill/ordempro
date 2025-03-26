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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('purchase_order_id')->references('id')->on('purchase_orders');
            $table->foreignId('partner_id')->references('id')->on('partners');
            $table->foreignId('currency_id')->references('id')->on('currencies');

            $table->string('prefix_code')->nullable();
            $table->string('sequence_number')->nullable();
            $table->string('purchase_code')->unique()->nullable();
            $table->string('reference_no')->nullable();

            $table->decimal('round_off', 20, 4)->default(0);
            $table->decimal('grand_total', 20, 4)->default(0);
            $table->decimal('paid_amount', 20, 4)->default(0);
            $table->decimal('exchange_rate', 20, 4)->nullable();

            $table->text('note')->nullable();

            $table->date('purchase_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
