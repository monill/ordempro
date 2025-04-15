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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->nullable(); // Empresa
            $table->foreignId('country_id')->constrained('countries')->nullable(); // País da empresa
            $table->foreignId('state_id')->constrained('states')->nullable(); // Estado da empresa
            $table->foreignId('city_id')->constrained('cities')->nullable(); // Cidade da empresa

            $table->string('name');
            $table->string('description')->nullable();
            $table->text('address')->nullable(); // Endereço e localização
            $table->boolean('is_enabled')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
