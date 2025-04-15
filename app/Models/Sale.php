<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * 
 * @property int $id
 * @property int|null $sale_order_id
 * @property int|null $quotation_id
 * @property int $partner_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $sale_code
 * @property string|null $reference_no
 * @property string $sale_status
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property string|null $note
 * @property Carbon $sale_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner $partner
 * @property Quotation|null $quotation
 * @property SaleOrder|null $sale_order
 *
 * @package App\Models
 */
class Sale extends Model
{
	protected $table = 'sales';

	protected $casts = [
		'sale_order_id' => 'int',
		'quotation_id' => 'int',
		'partner_id' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'sale_date' => 'datetime'
	];

	protected $fillable = [
		'sale_order_id',
		'quotation_id',
		'partner_id',
		'prefix_code',
		'count_id',
		'sale_code',
		'reference_no',
		'sale_status',
		'round_off',
		'grand_total',
		'paid_amount',
		'note',
		'sale_date'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function quotation()
	{
		return $this->belongsTo(Quotation::class);
	}

	public function sale_order()
	{
		return $this->belongsTo(SaleOrder::class);
	}
}
