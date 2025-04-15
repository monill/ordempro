<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prefix
 * 
 * @property int $id
 * @property int $company_id
 * @property string|null $order
 * @property string|null $service
 * @property string|null $job_code
 * @property string|null $service_master
 * @property string|null $customer
 * @property string|null $expense
 * @property string|null $purchase_order
 * @property string|null $purchase_bill
 * @property string|null $purchase_return
 * @property string|null $sale_order
 * @property string|null $sale
 * @property string|null $sale_return
 * @property string|null $stock_transfer
 * @property string|null $quotation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company $company
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Prefix extends Model
{
	protected $table = 'prefixes';

	protected $casts = [
		'company_id' => 'int'
	];

	protected $fillable = [
		'company_id',
		'order',
		'service',
		'job_code',
		'service_master',
		'customer',
		'expense',
		'purchase_order',
		'purchase_bill',
		'purchase_return',
		'sale_order',
		'sale',
		'sale_return',
		'stock_transfer',
		'quotation'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
