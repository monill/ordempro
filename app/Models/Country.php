<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $phone_code
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * 
 * @property Collection|City[] $cities
 * @property Collection|Company[] $companies
 * @property Collection|PartnerAddress[] $partner_addresses
 * @property Collection|State[] $states
 * @property Collection|Warehouse[] $warehouses
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'iso3',
		'phone_code',
		'currency',
		'currency_name',
		'currency_symbol'
	];

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

	public function states()
	{
		return $this->hasMany(State::class);
	}

	public function warehouses()
	{
		return $this->hasMany(Warehouse::class);
	}
}
