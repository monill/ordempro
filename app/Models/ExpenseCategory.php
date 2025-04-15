<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExpenseCategory
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Expense[] $expenses
 *
 * @package App\Models
 */
class ExpenseCategory extends Model
{
	use SoftDeletes;
	protected $table = 'expense_categories';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'is_enabled'
	];

	public function expenses()
	{
		return $this->hasMany(Expense::class);
	}
}
