<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusHistory
 * 
 * @property int $id
 * @property int|null $changed_by
 * @property string $statusable_type
 * @property int $statusable_id
 * @property string $status
 * @property string|null $note
 * @property Carbon $status_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class StatusHistory extends Model
{
	protected $table = 'status_histories';

	protected $casts = [
		'changed_by' => 'int',
		'statusable_id' => 'int',
		'status_date' => 'datetime'
	];

	protected $fillable = [
		'changed_by',
		'statusable_type',
		'statusable_id',
		'status',
		'note',
		'status_date'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'changed_by');
	}
}
