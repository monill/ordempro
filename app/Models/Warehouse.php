<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Warehouse
 *
 * @property int $id
 * @property int|null $company_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string $name
 * @property string|null $description
 * @property string|null $address
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property City|null $city
 * @property Company|null $company
 * @property Country|null $country
 * @property State|null $state
 * @property Collection|ItemBatchQuantity[] $item_batch_quantities
 * @property Collection|ItemBatchTransaction[] $item_batch_transactions
 * @property Collection|ItemQuantity[] $item_quantities
 * @property Collection|ItemSerialQuantity[] $item_serial_quantities
 * @property Collection|ItemSerialTransaction[] $item_serial_transactions
 * @property Collection|ItemStockTransfer[] $item_stock_transfers
 * @property Collection|ItemTransaction[] $item_transactions
 *
 * @package App\Models
 */
class Warehouse extends Model
{
	use SoftDeletes;
	protected $table = 'warehouses';

	protected $casts = [
		'company_id' => 'int',
		'country_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'country_id',
		'state_id',
		'city_id',
		'name',
		'description',
		'address',
		'is_enabled'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function item_batch_quantities()
	{
		return $this->hasMany(ItemBatchQuantity::class);
	}

	public function item_batch_transactions()
	{
		return $this->hasMany(ItemBatchTransaction::class);
	}

	public function item_quantities()
	{
		return $this->hasMany(ItemQuantity::class);
	}

	public function item_serial_quantities()
	{
		return $this->hasMany(ItemSerialQuantity::class);
	}

	public function item_serial_transactions()
	{
		return $this->hasMany(ItemSerialTransaction::class);
	}

	public function item_stock_transfers()
	{
		return $this->hasMany(ItemStockTransfer::class, 'to_warehouse_id');
	}

	public function item_transactions()
	{
		return $this->hasMany(ItemTransaction::class);
	}
}
