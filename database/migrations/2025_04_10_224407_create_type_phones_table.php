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
        Schema::create('type_phones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nome do tipo de telefone (ex: Celular, Comercial, Residencial)
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
        Schema::dropIfExists('type_phones');
    }
};
