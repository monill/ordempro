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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique(); // Código da moeda (ex: USD, EUR, BRL)
            $table->string('name')->unique(); // Nome da moeda (ex: Dólar Americano, Euro, Real Brasileiro)
            $table->string('symbol', 10)->nullable(); // Símbolo da moeda (ex: $, €, R$)
            $table->decimal('exchange_rate', 15, 6)->default(1); // Taxa de câmbio em relação à moeda padrão
            $table->boolean('is_active')->default(true); // Define se a moeda está ativa no sistema
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
