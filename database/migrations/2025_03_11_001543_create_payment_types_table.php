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
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Ex: "Cartão de Crédito", "Pix", "Boleto"
            $table->string('code')->unique(); // Ex: "credit_card", "pix", "boleto"
            $table->text('description')->nullable(); // Descrição opcional
            $table->boolean('is_enabled')->default(true); // Habilita/desabilita métodos de pagamento
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_types');
    }
};
