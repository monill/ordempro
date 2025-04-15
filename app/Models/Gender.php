<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gender
 * 
 * @property int $id
 * @property string $name
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Partner[] $partners
 *
 * @package App\Models
 */
class Gender extends Model
{
	use SoftDeletes;
	protected $table = 'genders';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_enabled'
	];

	public function partners()
	{
		return $this->hasMany(Partner::class);
	}
}
