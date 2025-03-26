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
        Schema::create('item_serial_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('item_transaction_id')->constrained('item_transactions');
            $table->foreignId('item_serial_id')->constrained('item_serials');
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->string('unique_code');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_serial_transactions');
    }
};
