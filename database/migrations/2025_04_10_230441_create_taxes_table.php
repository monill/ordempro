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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained('companies');

            $table->string('name'); // Nome do imposto (ex: IVA, ICMS, ISS)
            $table->decimal('rate', 8, 4)->default(0); // Taxa percentual do imposto (ex: 5.00 para 5%)
            $table->boolean('is_inclusive')->default(false); // Se o imposto está incluído no preço ou é adicionado separadamente
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
        Schema::dropIfExists('taxes');
    }
};
