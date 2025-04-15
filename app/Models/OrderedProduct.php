<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderedProduct
 * 
 * @property int $id
 * @property int $order_id
 * @property int $tax_id
 * @property int $assigned_user_id
 * @property Carbon|null $start_date
 * @property Carbon|null $start_time
 * @property Carbon|null $end_date
 * @property Carbon|null $end_time
 * @property float $unit_price
 * @property int $quantity
 * @property float $total_price
 * @property string $tax_type
 * @property float $tax_amount
 * @property float $discount
 * @property string $discount_type
 * @property float $discount_amount
 * @property float $total_price_after_discount
 * @property float $total_price_with_tax
 * @property string|null $job_code
 * @property string|null $staff_status
 * @property string|null $assigned_user_note
 * @property string|null $staff_status_note
 * @property string|null $description
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Order $order
 * @property Tax $tax
 *
 * @package App\Models
 */
class OrderedProduct extends Model
{
	use SoftDeletes;
	protected $table = 'ordered_products';

	protected $casts = [
		'order_id' => 'int',
		'tax_id' => 'int',
		'assigned_user_id' => 'int',
		'start_date' => 'datetime',
		'start_time' => 'datetime',
		'end_date' => 'datetime',
		'end_time' => 'datetime',
		'unit_price' => 'float',
		'quantity' => 'int',
		'total_price' => 'float',
		'tax_amount' => 'float',
		'discount' => 'float',
		'discount_amount' => 'float',
		'total_price_after_discount' => 'float',
		'total_price_with_tax' => 'float'
	];

	protected $fillable = [
		'order_id',
		'tax_id',
		'assigned_user_id',
		'start_date',
		'start_time',
		'end_date',
		'end_time',
		'unit_price',
		'quantity',
		'total_price',
		'tax_type',
		'tax_amount',
		'discount',
		'discount_type',
		'discount_amount',
		'total_price_after_discount',
		'total_price_with_tax',
		'job_code',
		'staff_status',
		'assigned_user_note',
		'staff_status_note',
		'description'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'assigned_user_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function tax()
	{
		return $this->belongsTo(Tax::class);
	}
}
