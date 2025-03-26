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
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            // Relação com a tabela de pedidos
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('tax_id')->constrained('taxes')->nullable();
            $table->foreignId('assigned_user_id')->constrained('users')->nullable();

            // Campos de data e hora do evento
            $table->date('start_date')->nullable()->comment('Event start date');
            $table->time('start_time')->nullable()->comment('Event start time');
            $table->date('end_date')->nullable()->comment('Event end date');
            $table->time('end_time')->nullable()->comment('Event end time');

            // Preço e quantidade do produto
            $table->decimal('unit_price', 10, 2)->default(0)->comment('Original price (without tax)');
            $table->integer('quantity')->default(0); // Quantidade como número inteiro
            $table->decimal('total_price', 10, 2)->default(0)->comment('(original price * quantity)');

            // Relação com o imposto
            $table->string('tax_type')->default('inclusive');
            $table->decimal('tax_amount', 10, 2)->default(0);

            // Desconto
            $table->decimal('discount', 10, 2)->default(0);
            $table->string('discount_type')->nullable()->comment('Fixed or percentage');
            $table->decimal('discount_amount', 10, 2)->default(0);

            // Preços após desconto e com imposto
            $table->decimal('total_price_after_discount', 10, 2)->default(0);
            $table->decimal('total_price_with_tax', 10, 2)->default(0);

            // Campos adicionais
            $table->string('job_code')->nullable();
            $table->string('staff_status')->nullable();
            $table->text('assigned_user_note')->nullable();
            $table->text('staff_status_note')->nullable();
            // Descrição do produto
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_products');
    }
};
