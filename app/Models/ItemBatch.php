<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemBatch
 * 
 * @property int $id
 * @property int $item_id
 * @property string|null $batch_no
 * @property string|null $model_no
 * @property string|null $color
 * @property string|null $size
 * @property float $mrp
 * @property Carbon|null $mfg_date
 * @property Carbon|null $exp_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Collection|ItemBatchQuantity[] $item_batch_quantities
 * @property Collection|ItemBatchTransaction[] $item_batch_transactions
 *
 * @package App\Models
 */
class ItemBatch extends Model
{
	protected $table = 'item_batches';

	protected $casts = [
		'item_id' => 'int',
		'mrp' => 'float',
		'mfg_date' => 'datetime',
		'exp_date' => 'datetime'
	];

	protected $fillable = [
		'item_id',
		'batch_no',
		'model_no',
		'color',
		'size',
		'mrp',
		'mfg_date',
		'exp_date'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function item_batch_quantities()
	{
		return $this->hasMany(ItemBatchQuantity::class);
	}

	public function item_batch_transactions()
	{
		return $this->hasMany(ItemBatchTransaction::class);
	}
}
