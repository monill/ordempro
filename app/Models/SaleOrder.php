<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SaleOrder
 * 
 * @property int $id
 * @property int $partner_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $order_code
 * @property string $order_status
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property string|null $note
 * @property Carbon $order_date
 * @property Carbon|null $due_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner $partner
 * @property Collection|Sale[] $sales
 *
 * @package App\Models
 */
class SaleOrder extends Model
{
	use SoftDeletes;
	protected $table = 'sale_orders';

	protected $casts = [
		'partner_id' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'order_date' => 'datetime',
		'due_date' => 'datetime'
	];

	protected $fillable = [
		'partner_id',
		'prefix_code',
		'count_id',
		'order_code',
		'order_status',
		'round_off',
		'grand_total',
		'paid_amount',
		'note',
		'order_date',
		'due_date'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function sales()
	{
		return $this->hasMany(Sale::class);
	}
}
