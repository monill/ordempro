<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Brand extends Model
{
	use SoftDeletes;
	protected $table = 'brands';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'is_enabled'
	];

	public function items()
	{
		return $this->hasMany(Item::class);
	}
}
