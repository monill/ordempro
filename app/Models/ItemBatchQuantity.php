<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemBatchQuantity
 * 
 * @property int $id
 * @property int $item_id
 * @property int $item_batch_id
 * @property int $warehouse_id
 * @property float $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ItemBatch $item_batch
 * @property Item $item
 * @property Warehouse $warehouse
 *
 * @package App\Models
 */
class ItemBatchQuantity extends Model
{
	protected $table = 'item_batch_quantities';

	protected $casts = [
		'item_id' => 'int',
		'item_batch_id' => 'int',
		'warehouse_id' => 'int',
		'quantity' => 'float'
	];

	protected $fillable = [
		'item_id',
		'item_batch_id',
		'warehouse_id',
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

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}
}
