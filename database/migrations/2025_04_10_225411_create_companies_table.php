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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            // Relacionamentos com outras tabelas
            $table->foreignId('language_id')->nullable()->constrained('languages');
            $table->foreignId('country_id')->nullable()->constrained('countries'); // País da empresa
            $table->foreignId('state_id')->nullable()->constrained('states'); // Estado da empresa
            $table->foreignId('city_id')->nullable()->constrained('cities'); // Cidade da empresa
            $table->foreignId('timezone_id')->nullable()->constrained('timezones'); // Timezone da empresa

            // Informações básicas
            $table->string('name');  // Nome da empresa
            $table->string('email')->nullable(); // E-mail de contato da empresa
            $table->string('phone')->nullable(); // Telefone principal da empresa
            $table->string('website')->nullable(); // Site da empresa
            $table->string('fax')->nullable(); // Número de fax (se aplicável)

            // Endereço e localização
            $table->string('zip_code', 50)->nullable(); // Código postal/CEP da empresa
            $table->string('street')->nullable();

            // Informações fiscais e financeiras
            $table->string('tax_number')->nullable(); // Número de identificação fiscal (CNPJ, CPF, etc.)
            $table->integer('default_payment_terms')->default(30); // Prazo de pagamento padrão (ex: 30 dias)
            $table->decimal('default_discount', 8, 4)->default(0); // Desconto padrão em vendas/serviços

            // Configurações de formato
            $table->string('date_format')->default('d-m-Y'); // Formato de data usado pela empresa
            $table->char('time_format', 4)->default('24'); // Formato de horário (12h/24h)

            // Personalização da marca
            $table->string('logo', 50)->nullable(); // Logo da empresa
            $table->string('favicon', 50)->nullable(); // Ícone da empresa (favicon)

            $table->string('colored_logo', 50)->nullable();
            $table->string('light_logo', 50)->nullable();
            $table->string('signature', 50)->nullable();
            $table->string('sms_api', 50)->nullable();
            $table->string('tax_type', 50)->default('tax');

            $table->integer('number_precision')->default(2);
            $table->integer('quantity_precision')->default(2);

            $table->boolean('show_sku')->default(1);
            $table->boolean('show_mrp')->default(1);
            $table->boolean('restrict_to_sell_above_mrp')->default(false);
            $table->boolean('restrict_to_sell_below_msp')->default(false);

            $table->boolean('enable_serial_tracking')->default(1);
            $table->boolean('enable_batch_tracking')->default(1);
            $table->boolean('is_batch_compulsory')->default(false);

            $table->boolean('enable_mfg_date')->default(1);
            $table->boolean('enable_exp_date')->default(1);
            $table->boolean('enable_model')->default(0);
            $table->boolean('enable_color')->default(0);
            $table->boolean('enable_size')->default(0);
            $table->boolean('show_tax_summary')->default(1);
            $table->boolean('auto_update_sale_price')->default(false);
            $table->boolean('auto_update_purchase_price')->default(false);
            $table->boolean('auto_update_average_purchase_price')->default(false);
            $table->boolean('is_enable_crm')->default(false);
            $table->boolean('show_party_due_payment')->default(true);
            $table->boolean('show_signature_on_invoice')->default(1);
            $table->boolean('show_terms_and_conditions_on_invoice')->default(1);
            $table->boolean('show_discount')->default(1);
            $table->boolean('allow_negative_stock_billing')->default(1);

            $table->text('terms_and_conditions')->nullable();
            $table->text('bank_details')->nullable();

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
        Schema::dropIfExists('companies');
    }
};
