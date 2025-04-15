<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypePayment
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|OrderPayment[] $order_payments
 * @property Collection|PaymentTransaction[] $payment_transactions
 *
 * @package App\Models
 */
class TypePayment extends Model
{
	use SoftDeletes;
	protected $table = 'type_payments';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'code',
		'description',
		'is_enabled'
	];

	public function order_payments()
	{
		return $this->hasMany(OrderPayment::class, 'payment_type_id');
	}

	public function payment_transactions()
	{
		return $this->hasMany(PaymentTransaction::class, 'type_transfer_to_payment_id');
	}
}
