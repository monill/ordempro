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
            $table->char('name', 100);
            $table->char('iso3', 4)->nullable();
            $table->char('iso2', 4)->nullable();
            $table->char('phone_code', 4)->nullable();
            $table->char('currency', 4)->nullable();
            $table->char('currency_name', 50)->nullable();
            $table->char('currency_symbol', 6)->nullable();
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
