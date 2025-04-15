<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * 
 * @property int $id
 * @property int|null $language_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $timezone_id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $website
 * @property string|null $fax
 * @property string|null $zip_code
 * @property string|null $street
 * @property string|null $tax_number
 * @property int $default_payment_terms
 * @property float $default_discount
 * @property string $date_format
 * @property string $time_format
 * @property string|null $logo
 * @property string|null $favicon
 * @property string|null $colored_logo
 * @property string|null $light_logo
 * @property string|null $signature
 * @property string|null $sms_api
 * @property string $tax_type
 * @property int $number_precision
 * @property int $quantity_precision
 * @property bool $show_sku
 * @property bool $show_mrp
 * @property bool $restrict_to_sell_above_mrp
 * @property bool $restrict_to_sell_below_msp
 * @property bool $enable_serial_tracking
 * @property bool $enable_batch_tracking
 * @property bool $is_batch_compulsory
 * @property bool $enable_mfg_date
 * @property bool $enable_exp_date
 * @property bool $enable_model
 * @property bool $enable_color
 * @property bool $enable_size
 * @property bool $show_tax_summary
 * @property bool $auto_update_sale_price
 * @property bool $auto_update_purchase_price
 * @property bool $auto_update_average_purchase_price
 * @property bool $is_enable_crm
 * @property bool $show_party_due_payment
 * @property bool $show_signature_on_invoice
 * @property bool $show_terms_and_conditions_on_invoice
 * @property bool $show_discount
 * @property bool $allow_negative_stock_billing
 * @property string|null $terms_and_conditions
 * @property string|null $bank_details
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City|null $city
 * @property Country|null $country
 * @property Language|null $language
 * @property State|null $state
 * @property Timezone|null $timezone
 * @property Collection|Item[] $items
 * @property Collection|Partner[] $partners
 * @property Collection|Prefix[] $prefixes
 * @property Collection|Tax[] $taxes
 * @property Collection|Unit[] $units
 * @property Collection|Warehouse[] $warehouses
 *
 * @package App\Models
 */
class Company extends Model
{
	use SoftDeletes;
	protected $table = 'companies';

	protected $casts = [
		'language_id' => 'int',
		'country_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'timezone_id' => 'int',
		'default_payment_terms' => 'int',
		'default_discount' => 'float',
		'number_precision' => 'int',
		'quantity_precision' => 'int',
		'show_sku' => 'bool',
		'show_mrp' => 'bool',
		'restrict_to_sell_above_mrp' => 'bool',
		'restrict_to_sell_below_msp' => 'bool',
		'enable_serial_tracking' => 'bool',
		'enable_batch_tracking' => 'bool',
		'is_batch_compulsory' => 'bool',
		'enable_mfg_date' => 'bool',
		'enable_exp_date' => 'bool',
		'enable_model' => 'bool',
		'enable_color' => 'bool',
		'enable_size' => 'bool',
		'show_tax_summary' => 'bool',
		'auto_update_sale_price' => 'bool',
		'auto_update_purchase_price' => 'bool',
		'auto_update_average_purchase_price' => 'bool',
		'is_enable_crm' => 'bool',
		'show_party_due_payment' => 'bool',
		'show_signature_on_invoice' => 'bool',
		'show_terms_and_conditions_on_invoice' => 'bool',
		'show_discount' => 'bool',
		'allow_negative_stock_billing' => 'bool',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'language_id',
		'country_id',
		'state_id',
		'city_id',
		'timezone_id',
		'name',
		'email',
		'phone',
		'website',
		'fax',
		'zip_code',
		'street',
		'tax_number',
		'default_payment_terms',
		'default_discount',
		'date_format',
		'time_format',
		'logo',
		'favicon',
		'colored_logo',
		'light_logo',
		'signature',
		'sms_api',
		'tax_type',
		'number_precision',
		'quantity_precision',
		'show_sku',
		'show_mrp',
		'restrict_to_sell_above_mrp',
		'restrict_to_sell_below_msp',
		'enable_serial_tracking',
		'enable_batch_tracking',
		'is_batch_compulsory',
		'enable_mfg_date',
		'enable_exp_date',
		'enable_model',
		'enable_color',
		'enable_size',
		'show_tax_summary',
		'auto_update_sale_price',
		'auto_update_purchase_price',
		'auto_update_average_purchase_price',
		'is_enable_crm',
		'show_party_due_payment',
		'show_signature_on_invoice',
		'show_terms_and_conditions_on_invoice',
		'show_discount',
		'allow_negative_stock_billing',
		'terms_and_conditions',
		'bank_details',
		'is_enabled'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function language()
	{
		return $this->belongsTo(Language::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function timezone()
	{
		return $this->belongsTo(Timezone::class);
	}

	public function items()
	{
		return $this->hasMany(Item::class);
	}

	public function partners()
	{
		return $this->hasMany(Partner::class);
	}

	public function prefixes()
	{
		return $this->hasMany(Prefix::class);
	}

	public function taxes()
	{
		return $this->hasMany(Tax::class);
	}

	public function units()
	{
		return $this->hasMany(Unit::class);
	}

	public function warehouses()
	{
		return $this->hasMany(Warehouse::class);
	}
}
