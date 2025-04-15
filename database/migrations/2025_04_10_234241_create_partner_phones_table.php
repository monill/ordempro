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
        Schema::create('partner_phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->nullable()->constrained('partners');
            $table->foreignId('type_phone_id')->nullable()->constrained('type_phones');
            $table->string('number', 50)->unique();
            $table->string('contact', 50)->nullable();
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
        Schema::dropIfExists('partner_phones');
    }
};
