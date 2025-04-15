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

            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('prefix_id')->nullable()->constrained('prefixes');
            $table->foreignId('item_category_id')->nullable()->constrained('item_categories'); // Categoria
            $table->foreignId('tax_id')->nullable()->constrained('taxes'); // Taxas
            $table->foreignId('brand_id')->nullable()->constrained('brands'); // Marcas

            $table->string('name', 50);
            $table->string('item_code', 50)->nullable()->unique(); // Código único do item (exemplo: SKU, código de barras)
            $table->string('sku', 50)->nullable()->unique(); // Código de rastreamento interno
            $table->boolean('is_service')->default(false); // Define se é um serviço ou um produto
            $table->text('description')->nullable(); // Descrição detalhada do item
            // Estoque
            $table->decimal('min_stock', 8, 4)->default(0); // Estoque mínimo para alerta de reposição
            $table->decimal('current_stock', 8, 4)->default(0); // Quantidade atual de estoque
            //Tracking
            $table->enum('tracking_type', ['serial', 'batch', 'lot'])->nullable()->comment('Tipo de rastreamento do item');
            $table->string('item_location', 50)->nullable();
            // Imagem
            $table->string('image_path', 50)->nullable(); // Caminho da imagem do item
            $table->boolean('is_enabled')->default(true); // Define se o item está ativo ou inativo
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
