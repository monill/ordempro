<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemSerialQuantity
 * 
 * @property int $id
 * @property int $item_id
 * @property int $item_serial_id
 * @property int $warehouse_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property ItemSerial $item_serial
 * @property Warehouse $warehouse
 *
 * @package App\Models
 */
class ItemSerialQuantity extends Model
{
	protected $table = 'item_serial_quantities';

	protected $casts = [
		'item_id' => 'int',
		'item_serial_id' => 'int',
		'warehouse_id' => 'int'
	];

	protected $fillable = [
		'item_id',
		'item_serial_id',
		'warehouse_id'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function item_serial()
	{
		return $this->belongsTo(ItemSerial::class);
	}

	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class);
	}
}
