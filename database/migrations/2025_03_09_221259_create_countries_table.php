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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique(); // Código do país (ISO 3166-1 alpha-3, ex: BRA, USA)
            $table->string('name')->unique(); // Nome do país
            $table->string('phone_code')->nullable(); // Código de telefone do país (ex: +55 para Brasil)
            $table->string('currency_code')->nullable(); // Código da moeda oficial (ex: BRL para Real)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
