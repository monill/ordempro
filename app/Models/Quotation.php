<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quotation
 * 
 * @property int $id
 * @property int $partner_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $quotation_code
 * @property string $quotation_status
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property float $exchange_rate
 * @property string|null $note
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner $partner
 * @property Collection|Sale[] $sales
 *
 * @package App\Models
 */
class Quotation extends Model
{
	use SoftDeletes;
	protected $table = 'quotations';

	protected $casts = [
		'partner_id' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'exchange_rate' => 'float'
	];

	protected $fillable = [
		'partner_id',
		'prefix_code',
		'count_id',
		'quotation_code',
		'quotation_status',
		'round_off',
		'grand_total',
		'paid_amount',
		'exchange_rate',
		'note'
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
