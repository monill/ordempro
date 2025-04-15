<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemSerial
 * 
 * @property int $id
 * @property int $item_id
 * @property string $serial_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Collection|ItemSerialQuantity[] $item_serial_quantities
 * @property Collection|ItemSerialTransaction[] $item_serial_transactions
 *
 * @package App\Models
 */
class ItemSerial extends Model
{
	protected $table = 'item_serials';

	protected $casts = [
		'item_id' => 'int'
	];

	protected $fillable = [
		'item_id',
		'serial_code'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function item_serial_quantities()
	{
		return $this->hasMany(ItemSerialQuantity::class);
	}

	public function item_serial_transactions()
	{
		return $this->hasMany(ItemSerialTransaction::class);
	}
}
