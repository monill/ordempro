<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * 
 * @property int $id
 * @property int $company_id
 * @property int|null $prefix_id
 * @property int|null $item_category_id
 * @property int|null $tax_id
 * @property int|null $brand_id
 * @property string $name
 * @property string|null $item_code
 * @property string|null $sku
 * @property bool $is_service
 * @property string|null $description
 * @property float $min_stock
 * @property float $current_stock
 * @property string|null $tracking_type
 * @property string|null $item_location
 * @property string|null $image_path
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Brand|null $brand
 * @property Company $company
 * @property ItemCategory|null $item_category
 * @property Prefix|null $prefix
 * @property Tax|null $tax
 * @property Collection|ItemBatchQuantity[] $item_batch_quantities
 * @property Collection|ItemBatchTransaction[] $item_batch_transactions
 * @property Collection|ItemBatch[] $item_batches
 * @property Collection|ItemPrice[] $item_prices
 * @property Collection|ItemQuantity[] $item_quantities
 * @property Collection|ItemSerialQuantity[] $item_serial_quantities
 * @property Collection|ItemSerialTransaction[] $item_serial_transactions
 * @property Collection|ItemSerial[] $item_serials
 * @property Collection|StockTransfer[] $stock_transfers
 * @property Collection|ItemTransaction[] $item_transactions
 * @property Collection|Unit[] $units
 *
 * @package App\Models
 */
class Item extends Model
{
	use SoftDeletes;
	protected $table = 'items';

	protected $casts = [
		'company_id' => 'int',
		'prefix_id' => 'int',
		'item_category_id' => 'int',
		'tax_id' => 'int',
		'brand_id' => 'int',
		'is_service' => 'bool',
		'min_stock' => 'float',
		'current_stock' => 'float',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'prefix_id',
		'item_category_id',
		'tax_id',
		'brand_id',
		'name',
		'item_code',
		'sku',
		'is_service',
		'description',
		'min_stock',
		'current_stock',
		'tracking_type',
		'item_location',
		'image_path',
		'is_enabled'
	];

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function item_category()
	{
		return $this->belongsTo(ItemCategory::class);
	}

	public function prefix()
	{
		return $this->belongsTo(Prefix::class);
	}

	public function tax()
	{
		return $this->belongsTo(Tax::class);
	}

	public function item_batch_quantities()
	{
		return $this->hasMany(ItemBatchQuantity::class);
	}

	public function item_batch_transactions()
	{
		return $this->hasMany(ItemBatchTransaction::class);
	}

	public function item_batches()
	{
		return $this->hasMany(ItemBatch::class);
	}

	public function item_prices()
	{
		return $this->hasMany(ItemPrice::class);
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

	public function item_serials()
	{
		return $this->hasMany(ItemSerial::class);
	}

	public function stock_transfers()
	{
		return $this->belongsToMany(StockTransfer::class, 'item_stock_transfers')
					->withPivot('id', 'from_warehouse_id', 'to_warehouse_id', 'from_item_transaction_id', 'to_item_transaction_id')
					->withTimestamps();
	}

	public function item_transactions()
	{
		return $this->hasMany(ItemTransaction::class);
	}

	public function units()
	{
		return $this->belongsToMany(Unit::class, 'item_units')
					->withPivot('id', 'conversion_factor', 'is_default', 'is_enabled', 'deleted_at')
					->withTimestamps();
	}
}
