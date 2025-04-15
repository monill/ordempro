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
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // Nome da categoria de despesa (ex: Aluguel, Salários, Transporte, etc.)
            $table->text('description')->nullable(); // Descrição detalhada ou observações sobre a categoria
            $table->boolean('is_enabled')->default(true); // Indica se a categoria está ativa ou desativada no sistema
            $table->softDeletes(); // Permite exclusão lógica (não remove do banco)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_categories');
    }
};
