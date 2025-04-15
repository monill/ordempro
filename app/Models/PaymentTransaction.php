<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentTransaction
 * 
 * @property int $id
 * @property int $type_payment_id
 * @property int|null $type_transfer_to_payment_id
 * @property int|null $created_by
 * @property string|null $transaction_id
 * @property string $transaction_type
 * @property float $amount
 * @property string|null $reference_no
 * @property string|null $source_payment_code
 * @property string|null $note
 * @property Carbon $transaction_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property TypePayment|null $type_payment
 *
 * @package App\Models
 */
class PaymentTransaction extends Model
{
	protected $table = 'payment_transactions';

	protected $casts = [
		'type_payment_id' => 'int',
		'type_transfer_to_payment_id' => 'int',
		'created_by' => 'int',
		'amount' => 'float',
		'transaction_date' => 'datetime'
	];

	protected $fillable = [
		'type_payment_id',
		'type_transfer_to_payment_id',
		'created_by',
		'transaction_id',
		'transaction_type',
		'amount',
		'reference_no',
		'source_payment_code',
		'note',
		'transaction_date'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function type_payment()
	{
		return $this->belongsTo(TypePayment::class, 'type_transfer_to_payment_id');
	}
}
