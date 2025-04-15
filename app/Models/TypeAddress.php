<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeAddress
 * 
 * @property int $id
 * @property string $name
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PartnerAddress[] $partner_addresses
 *
 * @package App\Models
 */
class TypeAddress extends Model
{
	use SoftDeletes;
	protected $table = 'type_addresses';

	protected $casts = [
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'name',
		'is_enabled'
	];

	public function partner_addresses()
	{
		return $this->hasMany(PartnerAddress::class);
	}
}
