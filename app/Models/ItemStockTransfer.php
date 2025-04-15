<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemStockTransfer
 * 
 * @property int $id
 * @property int $stock_transfer_id
 * @property int $item_id
 * @property int $from_warehouse_id
 * @property int $to_warehouse_id
 * @property int $from_item_transaction_id
 * @property int $to_item_transaction_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ItemTransaction $item_transaction
 * @property Warehouse $warehouse
 * @property Item $item
 * @property StockTransfer $stock_transfer
 *
 * @package App\Models
 */
class ItemStockTransfer extends Model
{
	protected $table = 'item_stock_transfers';

	protected $casts = [
		'stock_transfer_id' => 'int',
		'item_id' => 'int',
		'from_warehouse_id' => 'int',
		'to_warehouse_id' => 'int',
		'from_item_transaction_id' => 'int',
		'to_item_transaction_id' => 'int'
	];

	protected $fillable = [
		'stock_transfer_id',
		'item_id',
		'from_warehouse_id',
		'to_warehouse_id',
		'from_item_transaction_id',
		'to_item_transaction_id'
	];

	public function item_transaction()
	{
		return $this->belongsTo(ItemTransaction::class, 'to_item_transaction_id');
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class, 'to_warehouse_id');
	}

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function stock_transfer()
	{
		return $this->belongsTo(StockTransfer::class);
	}
}
