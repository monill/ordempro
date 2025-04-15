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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category_id')->constrained('expense_categories'); // Categoria da despesa

            $table->string('prefix_code', 50)->nullable(); // Prefixo para organização dos códigos (ex: EXP-)
            $table->string('count_id')->nullable(); // Contador interno (ex: 0001)
            $table->string('expense_code', 50)->nullable(); // Código completo da despesa (ex: EXP-0001)
            $table->text('note')->nullable(); // Observações ou descrição da despesa

            $table->decimal('round_off', 8, 4)->default(0); // Arredondamento (caso aplicável)
            $table->decimal('grand_total', 8, 4)->default(0); // Valor total da despesa
            $table->decimal('paid_amount', 8, 4)->default(0); // Valor já pago

            $table->date('expense_date'); // Data da despesa

            $table->softDeletes(); // Exclusão lógica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
