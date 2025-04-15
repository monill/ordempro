<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $direction
 * @property string|null $icon
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Company[] $companies
 *
 * @package App\Models
 */
class Language extends Model
{
	use SoftDeletes;
	protected $table = 'languages';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'code',
		'name',
		'direction',
		'icon',
		'is_enabled'
	];

	public function companies()
	{
		return $this->hasMany(Company::class);
	}
}
