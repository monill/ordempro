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
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_type_id')->constrained('payment_types');
            $table->foreignId('transfer_to_payment_type_id')->constrained('payment_types');

            $table->string('transaction_id')->nullable()->comment('If Online Payments');

            $table->enum('transaction_type', ['credit', 'debit', 'transfer']);

            $table->decimal('amount', 20, 4)->default(0);
            $table->string('reference_no')->nullable();

            $table->string('source_payment_code')->nullable()->comment('Identify from which form payment was made');

            $table->text('note')->nullable();

            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
