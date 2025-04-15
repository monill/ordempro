<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property int $country_id
 * @property string $name
 * 
 * @property Country $country
 * @property Collection|City[] $cities
 * @property Collection|Company[] $companies
 * @property Collection|PartnerAddress[] $partner_addresses
 * @property Collection|Warehouse[] $warehouses
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'states';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int'
	];

	protected $fillable = [
		'country_id',
		'name'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
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
