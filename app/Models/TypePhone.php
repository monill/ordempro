<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypePhone
 * 
 * @property int $id
 * @property string $name
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PartnerPhone[] $partner_phones
 *
 * @package App\Models
 */
class TypePhone extends Model
{
	use SoftDeletes;
	protected $table = 'type_phones';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_enabled'
	];

	public function partner_phones()
	{
		return $this->hasMany(PartnerPhone::class);
	}
}
