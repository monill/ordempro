<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PartnerPhone
 * 
 * @property int $id
 * @property int|null $partner_id
 * @property int|null $type_phone_id
 * @property string $number
 * @property string|null $contact
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner|null $partner
 * @property TypePhone|null $type_phone
 *
 * @package App\Models
 */
class PartnerPhone extends Model
{
	use SoftDeletes;
	protected $table = 'partner_phones';

	protected $casts = [
		'partner_id' => 'int',
		'type_phone_id' => 'int',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'partner_id',
		'type_phone_id',
		'number',
		'contact',
		'is_enabled'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	public function type_phone()
	{
		return $this->belongsTo(TypePhone::class);
	}
}
