<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderPayment
 * 
 * @property int $id
 * @property int $order_id
 * @property int $payment_type_id
 * @property string|null $transaction_id
 * @property float $amount
 * @property string|null $status
 * @property string|null $note
 * @property Carbon $payment_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Order $order
 * @property TypePayment $type_payment
 *
 * @package App\Models
 */
class OrderPayment extends Model
{
	use SoftDeletes;
	protected $table = 'order_payments';

	protected $casts = [
		'order_id' => 'int',
		'payment_type_id' => 'int',
		'amount' => 'float',
		'payment_date' => 'datetime'
	];

	protected $fillable = [
		'order_id',
		'payment_type_id',
		'transaction_id',
		'amount',
		'status',
		'note',
		'payment_date'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function type_payment()
	{
		return $this->belongsTo(TypePayment::class, 'payment_type_id');
	}
}
