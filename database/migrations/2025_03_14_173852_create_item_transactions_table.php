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
        Schema::create('item_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('tax_id')->constrained('taxes');
            $table->foreignId('warehouse_id')->constrained('warehouses');

            //auto creates transaction_id & transaction_type
            $table->morphs('transaction');

            $table->string('unique_code');
            $table->string('tracking_type');
            $table->text('description')->nullable();
            $table->decimal('mrp', 20, 4)->default(0);
            $table->decimal('quantity', 20, 4)->default(0);

            // Each Qty Price: with or without tax
            $table->decimal('unit_price', 20, 4)->default(0);
            // Discount
            $table->decimal('discount', 20, 4)->default(0);
            $table->decimal('discount_amount', 20, 4)->default(0);
            $table->string('discount_type')->default('percentage'); //percentage or fixed
            // Tax, general, batch, serial
            $table->string('tax_type')->default('inclusive');
            $table->decimal('tax_amount', 20, 4)->default(0);

            $table->decimal('total', 20, 4)->default(0)->comment('Including (Discount) - (with or without Tax) ');

            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_transactions');
    }
};
