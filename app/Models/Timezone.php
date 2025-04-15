<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Timezone
 * 
 * @property int $id
 * @property string $name
 * @property string|null $offset
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Company[] $companies
 *
 * @package App\Models
 */
class Timezone extends Model
{
	use SoftDeletes;
	protected $table = 'timezones';

	protected $fillable = [
		'name',
		'offset'
	];

	public function companies()
	{
		return $this->hasMany(Company::class);
	}
}
