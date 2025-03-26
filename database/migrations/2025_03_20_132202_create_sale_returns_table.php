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
        Schema::create('sale_returns', function (Blueprint $table) {
            $table->id();

            $table->foreignId('partner_id')->references('id')->on('partners');
            $table->foreignId('currency_id')->references('id')->on('currencies')->nullable();

            $table->string('prefix_code')->nullable();
            $table->string('count_id')->nullable();
            $table->string('return_code')->nullable();
            $table->string('reference_no')->nullable();

            $table->decimal('round_off', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('grand_total', 10, 2)->default(0); // Ajuste na precisão
            $table->decimal('paid_amount', 10, 2)->default(0); // Ajuste na precisão

            $table->text('note')->nullable();

            $table->date('return_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_returns');
    }
};
