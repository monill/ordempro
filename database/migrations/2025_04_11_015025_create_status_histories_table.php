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
        Schema::create('status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('changed_by')->nullable()->constrained('users');
            $table->morphs('statusable'); // Cria statusable_id e statusable_type
            $table->enum('status', ['pending', 'approved', 'completed', 'canceled']); // ou string
            $table->text('note')->nullable();

            $table->date('status_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_histories');
    }
};
