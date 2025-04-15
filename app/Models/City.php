<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property int $country_id
 * @property int $state_id
 * @property string $name
 * 
 * @property Country $country
 * @property State $state
 * @property Collection|Company[] $companies
 * @property Collection|PartnerAddress[] $partner_addresses
 * @property Collection|Warehouse[] $warehouses
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int',
		'state_id' => 'int'
	];

	protected $fillable = [
		'country_id',
		'state_id',
		'name'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function companies()
	{
		return $this->hasMany(Company::class);
	}

	public function partner_addresses()
	{
		return $this->hasMany(PartnerAddress::class);
	}

	public function warehouses()
	{
		return $this->hasMany(Warehouse::class);
	}
}
