<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ItemUnit
 * 
 * @property int $id
 * @property int $item_id
 * @property int $unit_id
 * @property float $conversion_factor
 * @property bool $is_default
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Unit $unit
 *
 * @package App\Models
 */
class ItemUnit extends Model
{
	use SoftDeletes;
	protected $table = 'item_units';

	protected $casts = [
		'item_id' => 'int',
		'unit_id' => 'int',
		'conversion_factor' => 'float',
		'is_default' => 'bool',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'item_id',
		'unit_id',
		'conversion_factor',
		'is_default',
		'is_enabled'
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
