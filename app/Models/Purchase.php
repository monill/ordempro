<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 * 
 * @property int $id
 * @property int $purchase_order_id
 * @property int $partner_id
 * @property int|null $created_by
 * @property int|null $confirmed_by
 * @property string|null $prefix_code
 * @property string|null $sequence_number
 * @property string|null $purchase_code
 * @property string|null $reference_no
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property float|null $exchange_rate
 * @property string $purchase_status
 * @property string $payment_status
 * @property string|null $note
 * @property Carbon $purchase_date
 * @property Carbon|null $confirmed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Partner $partner
 * @property PurchaseOrder $purchase_order
 *
 * @package App\Models
 */
class Purchase extends Model
{
	protected $table = 'purchases';

	protected $casts = [
		'purchase_order_id' => 'int',
		'partner_id' => 'int',
		'created_by' => 'int',
		'confirmed_by' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'exchange_rate' => 'float',
		'purchase_date' => 'datetime',
		'confirmed_at' => 'datetime'
	];

	protected $fillable = [
		'purchase_order_id',
		'partner_id',
		'created_by',
		'confirmed_by',
		'prefix_code',
		'sequence_number',
		'purchase_code',
		'reference_no',
		'round_off',
		'grand_total',
		'paid_amount',
		'exchange_rate',
		'purchase_status',
		'payment_status',
		'note',
		'purchase_date',
		'confirmed_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function purchase_order()
	{
		return $this->belongsTo(PurchaseOrder::class);
	}
}
