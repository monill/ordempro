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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gender_id')->nullable()->constrained('genders');

            $table->enum('party_type', ['customer', 'supplier', 'both'])->default('customer');

            // Nome (Pessoa Física ou Jurídica)
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable(); // Nome Fantasia (Se for uma empresa)
            $table->string('email')->nullable();

            // Identificação Fiscal (união de NIF, SSN, CPF, etc)
            $table->string('tax_identifier')->nullable(); // Ex: NIF, SSN, VAT Number, etc

            $table->text('comments')->nullable();

            // Campos específicos
            $table->boolean('birthday_email')->default(0);
            $table->date('birthday')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
