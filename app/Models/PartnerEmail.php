<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PartnerEmail
 * 
 * @property int $id
 * @property int|null $partner_id
 * @property string $email
 * @property string|null $contact
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Partner|null $partner
 *
 * @package App\Models
 */
class PartnerEmail extends Model
{
	use SoftDeletes;
	protected $table = 'partner_emails';

	protected $casts = [
		'partner_id' => 'int',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'partner_id',
		'email',
		'contact',
		'is_enabled'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class);
	}
}
