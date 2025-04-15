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
            $table->foreignId('purchase_order_id')->constrained('purchase_orders');
            $table->foreignId('partner_id')->constrained('partners');
            //$table->foreignId('currency_id')->nullable()->constrained('currencies');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('confirmed_by')->nullable()->constrained('users');

            $table->string('prefix_code', 50)->nullable();
            $table->string('sequence_number', 50)->nullable();
            $table->string('purchase_code', 50)->unique()->nullable();
            $table->string('reference_no', 50)->nullable();

            $table->decimal('round_off', 8, 4)->default(0);
            $table->decimal('grand_total', 8, 4)->default(0);
            $table->decimal('paid_amount', 8, 4)->default(0);
            $table->decimal('exchange_rate', 8, 4)->nullable();

            $table->enum('purchase_status', ['pending', 'received', 'partially_received', 'canceled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'partially_paid', 'paid'])->default('unpaid');

            $table->text('note')->nullable();

            $table->date('purchase_date');
            $table->timestamp('confirmed_at')->nullable();
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
