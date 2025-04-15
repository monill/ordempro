<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Expense
 * 
 * @property int $id
 * @property int $expense_category_id
 * @property string|null $prefix_code
 * @property string|null $count_id
 * @property string|null $expense_code
 * @property string|null $note
 * @property float $round_off
 * @property float $grand_total
 * @property float $paid_amount
 * @property Carbon $expense_date
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ExpenseCategory $expense_category
 * @property Collection|ExpenseItem[] $expense_items
 *
 * @package App\Models
 */
class Expense extends Model
{
	use SoftDeletes;
	protected $table = 'expenses';

	protected $casts = [
		'expense_category_id' => 'int',
		'round_off' => 'float',
		'grand_total' => 'float',
		'paid_amount' => 'float',
		'expense_date' => 'datetime'
	];

	protected $fillable = [
		'expense_category_id',
		'prefix_code',
		'count_id',
		'expense_code',
		'note',
		'round_off',
		'grand_total',
		'paid_amount',
		'expense_date'
	];

	public function expense_category()
	{
		return $this->belongsTo(ExpenseCategory::class);
	}

	public function expense_items()
	{
		return $this->hasMany(ExpenseItem::class);
	}
}
