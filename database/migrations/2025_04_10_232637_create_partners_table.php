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
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('gender_id')->nullable()->constrained('genders');

            $table->enum('partner_type', ['customer', 'supplier', 'both'])->default('customer');
            $table->string('full_name'); // Nome (Pessoa Física ou Jurídica)
            $table->string('tax_identifier', 25)->nullable()->unique(); // Identificação Fiscal (união de NIF, SSN, CPF, etc)
            $table->text('comments')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('birthday_email')->default(0);
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
        Schema::dropIfExists('partners');
    }
};
