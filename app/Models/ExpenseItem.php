<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExpenseItem
 * 
 * @property int $id
 * @property int $expense_id
 * @property int|null $tax_id
 * @property string $name
 * @property string|null $description
 * @property float $unit_price
 * @property float $quantity
 * @property string $tax_type
 * @property float $tax_amount
 * @property float $discount
 * @property string $discount_type
 * @property float $discount_amount
 * @property float $total
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Expense $expense
 * @property Tax|null $tax
 *
 * @package App\Models
 */
class ExpenseItem extends Model
{
	use SoftDeletes;
	protected $table = 'expense_items';

	protected $casts = [
		'expense_id' => 'int',
		'tax_id' => 'int',
		'unit_price' => 'float',
		'quantity' => 'float',
		'tax_amount' => 'float',
		'discount' => 'float',
		'discount_amount' => 'float',
		'total' => 'float'
	];

	protected $fillable = [
		'expense_id',
		'tax_id',
		'name',
		'description',
		'unit_price',
		'quantity',
		'tax_type',
		'tax_amount',
		'discount',
		'discount_type',
		'discount_amount',
		'total'
	];

	public function expense()
	{
		return $this->belongsTo(Expense::class);
	}

	public function tax()
	{
		return $this->belongsTo(Tax::class);
	}
}
