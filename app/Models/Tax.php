<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tax
 * 
 * @property int $id
 * @property int|null $company_id
 * @property string $name
 * @property float $rate
 * @property bool $is_inclusive
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company|null $company
 * @property Collection|ExpenseItem[] $expense_items
 * @property Collection|ItemTransaction[] $item_transactions
 * @property Collection|Item[] $items
 * @property Collection|OrderedProduct[] $ordered_products
 *
 * @package App\Models
 */
class Tax extends Model
{
	use SoftDeletes;
	protected $table = 'taxes';

	protected $casts = [
		'company_id' => 'int',
		'rate' => 'float',
		'is_inclusive' => 'bool',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'name',
		'rate',
		'is_inclusive',
		'is_enabled'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function expense_items()
	{
		return $this->hasMany(ExpenseItem::class);
	}

	public function item_transactions()
	{
		return $this->hasMany(ItemTransaction::class);
	}

	public function items()
	{
		return $this->hasMany(Item::class);
	}

	public function ordered_products()
	{
		return $this->hasMany(OrderedProduct::class);
	}
}
