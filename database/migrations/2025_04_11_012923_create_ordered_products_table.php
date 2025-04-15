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
            $table->foreignId('order_id')->constrained('orders'); // Pedido relacionado
            $table->foreignId('tax_id')->constrained('taxes')->nullable(); // Imposto aplicado
            $table->foreignId('assigned_user_id')->constrained('users')->nullable(); // Funcionário atribuído

            // Datas e horários do evento (se aplicável)
            $table->date('start_date')->nullable()->comment('Event start date'); // Data de início
            $table->time('start_time')->nullable()->comment('Event start time'); // Hora de início
            $table->date('end_date')->nullable()->comment('Event end date'); // Data de término
            $table->time('end_time')->nullable()->comment('Event end time'); // Hora de término

            // Preço e quantidade
            $table->decimal('unit_price', 8, 4)->default(0)->comment('Original price (without tax)'); // Preço unitário sem imposto
            $table->integer('quantity')->default(0); // Quantidade do produto
            $table->decimal('total_price', 8, 4)->default(0)->comment('(original price * quantity)'); // Total antes de desconto e imposto

            // Imposto
            $table->string('tax_type')->default('inclusive'); // Tipo do imposto: inclusive/exclusive
            $table->decimal('tax_amount', 8, 4)->default(0); // Valor do imposto

            // Desconto
            $table->decimal('discount', 8, 4)->default(0); // Valor de desconto
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage'); // Tipo de desconto
            $table->decimal('discount_amount', 8, 4)->default(0); // Valor aplicado do desconto

            // Totais após desconto e imposto
            $table->decimal('total_price_after_discount', 8, 4)->default(0); // Total com desconto
            $table->decimal('total_price_with_tax', 8, 4)->default(0); // Total com imposto (final)

            // Dados adicionais (opcionais)
            $table->string('job_code')->nullable(); // Código do trabalho (se aplicável)
            $table->string('staff_status')->nullable(); // Status do funcionário
            $table->text('assigned_user_note')->nullable(); // Observações do funcionário
            $table->text('staff_status_note')->nullable(); // Observações sobre o status

            $table->text('description')->nullable(); // Descrição do produto/serviço
            $table->softDeletes();
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
