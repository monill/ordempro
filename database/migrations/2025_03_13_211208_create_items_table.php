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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            // Categoria e Unidade de Medida
            $table->foreignId('prefix_id')->nullable()->constrained('prefixes');
            $table->foreignId('item_category_id')->nullable()->constrained('item_categories'); // Categoria
            $table->foreignId('base_unit_id')->nullable()->constrained('units'); // Unidade
            $table->foreignId('secondary_unit_id')->nullable()->constrained('units'); // Unidade
            $table->foreignId('tax_id')->nullable()->constrained('taxes'); // Taxas
            $table->foreignId('brand_id')->nullable()->constrained('brands'); // Marcas

            $table->string('item_code')->unique()->nullable(); // Código único do item (exemplo: SKU, código de barras)
            $table->string('name');
            $table->string('sku')->nullable(); // Código de rastreamento interno
            $table->boolean('is_service')->default(0); // Define se é um serviço ou um produto
            $table->text('description')->nullable(); // Descrição detalhada do item
            // Estoque
            $table->decimal('min_stock', 20, 4)->default(0); // Estoque mínimo para alerta de reposição
            $table->decimal('current_stock', 20, 4)->default(0); // Quantidade atual de estoque
            // Detalhes de precificação
            $table->decimal('sale_price', 20, 4)->default(0); // Preço de venda do item
            $table->boolean('is_sale_price_with_tax')->default(0); // Se o preço de venda inclui imposto ou não
            $table->decimal('sale_price_discount', 20, 4)->default(0); // Desconto aplicado no preço de venda
            $table->string('sale_price_discount_type'); // Tipo de desconto (percentual ou fixo)
            $table->decimal('purchase_price', 20, 4)->default(0); // Preço de compra do item
            $table->boolean('is_purchase_price_with_tax')->default(0); // Se o preço de compra inclui imposto ou não
            $table->decimal('mrp', 20, 4)->default(0); // Preço máximo de venda ao consumidor.
            $table->decimal('msp', 20, 4)->default(0); // Preço sugerido pelo fabricante, mas não necessariamente o preço final.
            //Tracking
            $table->string('tracking_type')->nullable();
            $table->string('item_location')->nullable();
            // Imagem
            $table->string('image_path')->nullable(); // Caminho da imagem do item
            $table->boolean('is_enabled')->default(1); // Define se o item está ativo ou inativo
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
