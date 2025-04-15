<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ItemTransaction
 * 
 * @property int $id
 * @property int $item_id
 * @property int $unit_id
 * @property int $tax_id
 * @property int $warehouse_id
 * @property string $transaction_type
 * @property int $transaction_id
 * @property string $unique_code
 * @property string $tracking_type
 * @property string|null $description
 * @property float $mrp
 * @property float $quantity
 * @property float $unit_price
 * @property float $discount
 * @property float $discount_amount
 * @property string $discount_type
 * @property string $tax_type
 * @property float $tax_amount
 * @property float $total
 * @property Carbon $transaction_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Tax $tax
 * @property Unit $unit
 * @property Warehouse $warehouse
 * @property Collection|ItemBatchTransaction[] $item_batch_transactions
 * @property Collection|ItemSerialTransaction[] $item_serial_transactions
 * @property Collection|ItemStockTransfer[] $item_stock_transfers
 *
 * @package App\Models
 */
class ItemTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'item_transactions';

	protected $casts = [
		'item_id' => 'int',
		'unit_id' => 'int',
		'tax_id' => 'int',
		'warehouse_id' => 'int',
		'transaction_id' => 'int',
		'mrp' => 'float',
		'quantity' => 'float',
		'unit_price' => 'float',
		'discount' => 'float',
		'discount_amount' => 'float',
		'tax_amount' => 'float',
		'total' => 'float',
		'transaction_date' => 'datetime'
	];

	protected $fillable = [
		'item_id',
		'unit_id',
		'tax_id',
		'warehouse_id',
		'transaction_type',
		'transaction_id',
		'unique_code',
		'tracking_type',
		'description',
		'mrp',
		'quantity',
		'unit_price',
		'discount',
		'discount_amount',
		'discount_type',
		'tax_type',
		'tax_amount',
		'total',
		'transaction_date'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function tax()
	{
		return $this->belongsTo(Tax::class);
	}

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}

	public function item_batch_transactions()
	{
		return $this->hasMany(ItemBatchTransaction::class);
	}

	public function item_serial_transactions()
	{
		return $this->hasMany(ItemSerialTransaction::class);
	}

	public function item_stock_transfers()
	{
		return $this->hasMany(ItemStockTransfer::class, 'to_item_transaction_id');
	}
}
