<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemBatchTransaction
 * 
 * @property int $id
 * @property int $item_id
 * @property int $item_transaction_id
 * @property int $item_batch_id
 * @property int $warehouse_id
 * @property string $unique_code
 * @property float $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ItemBatch $item_batch
 * @property Item $item
 * @property ItemTransaction $item_transaction
 * @property Warehouse $warehouse
 *
 * @package App\Models
 */
class ItemBatchTransaction extends Model
{
	protected $table = 'item_batch_transactions';

	protected $casts = [
		'item_id' => 'int',
		'item_transaction_id' => 'int',
		'item_batch_id' => 'int',
		'warehouse_id' => 'int',
		'quantity' => 'float'
	];

	protected $fillable = [
		'item_id',
		'item_transaction_id',
		'item_batch_id',
		'warehouse_id',
		'unique_code',
		'quantity'
	];

	public function item_batch()
	{
		return $this->belongsTo(ItemBatch::class);
	}

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function item_transaction()
	{
		return $this->belongsTo(ItemTransaction::class);
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}
}
