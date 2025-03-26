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
        Schema::create('expense_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('expense_id')->constrained('expenses'); // Relaciona com expenses
            $table->foreignId('tax_id')->nullable()->constrained('taxes');

            $table->string('name'); // Nome do item de despesa
            $table->text('description')->nullable();
            $table->decimal('unit_price', 20, 4)->default(0)->comment('original price(without tax)');
            $table->decimal('quantity', 20, 4)->default(0);
            $table->string('tax_type')->default('inclusive');
            $table->decimal('tax_amount', 20, 4)->default(0);
            $table->decimal('discount', 20, 4)->default(0);
            $table->string('discount_type')->nullable()->comment('fixed or percentage');
            $table->decimal('discount_amount', 20, 4)->default(0);
            $table->decimal('total', 20, 4)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_items');
    }
};
