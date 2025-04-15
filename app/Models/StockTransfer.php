<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StockTransfer
 * 
 * @property int $id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $transfer_code
 * @property string|null $note
 * @property Carbon $transfer_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class StockTransfer extends Model
{
	protected $table = 'stock_transfers';

	protected $casts = [
		'transfer_date' => 'datetime'
	];

	protected $fillable = [
		'prefix_code',
		'count_id',
		'transfer_code',
		'note',
		'transfer_date'
	];

	public function items()
	{
		return $this->belongsToMany(Item::class, 'item_stock_transfers')
					->withPivot('id', 'from_warehouse_id', 'to_warehouse_id', 'from_item_transaction_id', 'to_item_transaction_id')
					->withTimestamps();
	}
}
