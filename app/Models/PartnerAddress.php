<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PartnerAddress
 * 
 * @property int $id
 * @property int|null $partner_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $type_address_id
 * @property string $address
 * @property string|null $zip_code
 * @property string|null $complement
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City|null $city
 * @property Country|null $country
 * @property Partner|null $partner
 * @property State|null $state
 * @property TypeAddress|null $type_address
 *
 * @package App\Models
 */
class PartnerAddress extends Model
{
	use SoftDeletes;
	protected $table = 'partner_addresses';

	protected $casts = [
		'partner_id' => 'int',
		'country_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'type_address_id' => 'int',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'partner_id',
		'country_id',
		'state_id',
		'city_id',
		'type_address_id',
		'address',
		'zip_code',
		'complement',
		'is_enabled'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function type_address()
	{
		return $this->belongsTo(TypeAddress::class);
	}
}
