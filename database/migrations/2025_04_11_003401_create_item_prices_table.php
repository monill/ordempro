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
        Schema::create('item_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items');
            // Unidade de medida para a qual esse preço é aplicado (ex: 1kg, 500g, 1 caixa, etc.)
            // Pode ser nulo se for o preço padrão do item sem unidade alternativa
            $table->foreignId('unit_id')->nullable()->constrained('units'); // preço por unidade alternativa

            // Tipo de preço:
            // - sale: preço de venda
            // - purchase: preço de compra
            // - mrp: preço máximo para o consumidor (teto legal)
            // - msp: preço sugerido pelo fabricante
            $table->enum('price_type', ['sale', 'purchase', 'mrp', 'msp'])->default('sale');
            $table->decimal('price', 8, 4)->default(0); // Valor do preço principal
            $table->boolean('price_with_tax')->default(false); // Define se o valor de "price" já inclui o imposto ou não

            $table->decimal('discount', 8, 4)->default(0); // Valor do desconto (aplicado sobre o price)
            // Tipo de desconto:
            // - percentage: desconto percentual (ex: 10%)
            // - fixed: valor fixo a ser subtraído (ex: R$ 5,00)
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_prices');
    }
};
