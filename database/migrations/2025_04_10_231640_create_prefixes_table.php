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
        Schema::create('prefixes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');

            $table->string('order', 10)->nullable();
            $table->string('service', 10)->nullable();
            $table->string('job_code', 10)->nullable(); // Usado no OrderedProduct Model
            $table->string('service_master', 10)->nullable();
            $table->string('customer', 10)->nullable();
            $table->string('expense', 10)->nullable();
            $table->string('purchase_order', 10)->nullable();
            $table->string('purchase_bill', 10)->nullable();
            $table->string('purchase_return', 10)->nullable();
            $table->string('sale_order', 10)->nullable();
            $table->string('sale', 10)->nullable();
            $table->string('sale_return', 10)->nullable();
            $table->string('stock_transfer', 10)->nullable();
            $table->string('quotation', 10)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefixes');
    }
};
