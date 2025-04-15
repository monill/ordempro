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
            $table->foreignId('expense_id')->constrained('expenses'); // Referência à despesa principal
            $table->foreignId('tax_id')->nullable()->constrained('taxes'); // Imposto aplicado (opcional)

            $table->string('name'); // Nome do item de despesa (ex: manutenção, material de escritório)
            $table->text('description')->nullable(); // Descrição adicional do item
            $table->decimal('unit_price', 8, 4)->default(0)->comment('original price (without tax)'); // Preço unitário bruto
            $table->decimal('quantity', 8, 4)->default(0); // Quantidade do item
            $table->string('tax_type')->default('inclusive'); // Tipo de imposto (inclusive ou exclusive)
            $table->decimal('tax_amount', 8, 4)->default(0); // Valor do imposto calculado
            $table->decimal('discount', 8, 4)->default(0); // Valor de desconto original (antes de aplicar)
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage'); // Tipo de desconto
            $table->decimal('discount_amount', 8, 4)->default(0); // Valor final do desconto calculado
            $table->decimal('total', 8, 4)->default(0); // Total final com impostos e descontos aplicados

            $table->softDeletes();
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
