<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SaleReturn
 * 
 * @property int $id
 * @property int $partner_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $return_code
 * @property string|null $reference_no
 * @property string $return_status
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property string|null $note
 * @property Carbon $return_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner $partner
 *
 * @package App\Models
 */
class SaleReturn extends Model
{
	use SoftDeletes;
	protected $table = 'sale_returns';

	protected $casts = [
		'partner_id' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'return_date' => 'datetime'
	];

	protected $fillable = [
		'partner_id',
		'prefix_code',
		'count_id',
		'return_code',
		'reference_no',
		'return_status',
		'round_off',
		'grand_total',
		'paid_amount',
		'note',
		'return_date'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}
}
