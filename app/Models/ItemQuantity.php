<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemQuantity
 * 
 * @property int $id
 * @property int $item_id
 * @property int $warehouse_id
 * @property float $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Warehouse $warehouse
 *
 * @package App\Models
 */
class ItemQuantity extends Model
{
	protected $table = 'item_quantities';

	protected $casts = [
		'item_id' => 'int',
		'warehouse_id' => 'int',
		'quantity' => 'float'
	];

	protected $fillable = [
		'item_id',
		'warehouse_id',
		'quantity'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}
}
