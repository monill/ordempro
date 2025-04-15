<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $partner_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $order_code
 * @property string|null $order_status
 * @property float $total_amount
 * @property float $paid_amount
 * @property string|null $payment_status
 * @property string|null $note
 * @property string|null $schedule_note
 * @property Carbon $order_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner $partner
 * @property Collection|OrderPayment[] $order_payments
 * @property Collection|OrderedProduct[] $ordered_products
 *
 * @package App\Models
 */
class Order extends Model
{
	use SoftDeletes;
	protected $table = 'orders';

	protected $casts = [
		'partner_id' => 'int',
		'total_amount' => 'float',
		'paid_amount' => 'float',
		'order_date' => 'datetime'
	];

	protected $fillable = [
		'partner_id',
		'prefix_code',
		'count_id',
		'order_code',
		'order_status',
		'total_amount',
		'paid_amount',
		'payment_status',
		'note',
		'schedule_note',
		'order_date'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function order_payments()
	{
		return $this->hasMany(OrderPayment::class);
	}

	public function ordered_products()
	{
		return $this->hasMany(OrderedProduct::class);
	}
}
