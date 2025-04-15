<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * 
 * @property int $id
 * @property int|null $company_id
 * @property string $name
 * @property string $short_code
 * @property string|null $description
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company|null $company
 * @property Collection|ItemPrice[] $item_prices
 * @property Collection|ItemTransaction[] $item_transactions
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Unit extends Model
{
	use SoftDeletes;
	protected $table = 'units';

	protected $casts = [
		'company_id' => 'int',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'name',
		'short_code',
		'description',
		'is_enabled'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function item_prices()
	{
		return $this->hasMany(ItemPrice::class);
	}

	public function item_transactions()
	{
		return $this->hasMany(ItemTransaction::class);
	}

	public function items()
	{
		return $this->belongsToMany(Item::class, 'item_units')
					->withPivot('id', 'conversion_factor', 'is_default', 'is_enabled', 'deleted_at')
					->withTimestamps();
	}
}
