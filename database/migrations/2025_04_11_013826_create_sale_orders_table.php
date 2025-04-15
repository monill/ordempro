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
            // $table->foreignId('currency_id')->nullable()->constrained('currencies');

            $table->string('prefix_code', 50)->nullable();
            $table->string('count_id', 50)->nullable();
            $table->string('order_code', 50)->nullable();

            $table->enum('order_status', ['pending', 'completed', 'canceled', 'shipped', 'delivered'])->default('pending');

            $table->decimal('round_off', 8, 4)->default(0);
            $table->decimal('grand_total', 8, 4)->default(0);
            $table->decimal('paid_amount', 8, 4)->default(0);

            $table->text('note')->nullable();

            $table->date('order_date');
            $table->date('due_date')->nullable();
            $table->softDeletes();
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
