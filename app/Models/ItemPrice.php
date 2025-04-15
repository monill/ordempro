<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ItemPrice
 * 
 * @property int $id
 * @property int $item_id
 * @property int|null $unit_id
 * @property string $price_type
 * @property float $price
 * @property bool $price_with_tax
 * @property float $discount
 * @property string $discount_type
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Unit|null $unit
 *
 * @package App\Models
 */
class ItemPrice extends Model
{
	use SoftDeletes;
	protected $table = 'item_prices';

	protected $casts = [
		'item_id' => 'int',
		'unit_id' => 'int',
		'price' => 'float',
		'price_with_tax' => 'bool',
		'discount' => 'float'
	];

	protected $fillable = [
		'item_id',
		'unit_id',
		'price_type',
		'price',
		'price_with_tax',
		'discount',
		'discount_type'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function unit()
	{
		return $this->belongsTo(Unit::class);
	}
}
