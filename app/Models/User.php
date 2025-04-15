<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $avatar
 * @property bool $access_all_warehouses
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|OrderedProduct[] $ordered_products
 * @property Collection|PaymentTransaction[] $payment_transactions
 * @property Collection|Purchase[] $purchases
 * @property Collection|StatusHistory[] $status_histories
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'access_all_warehouses' => 'bool',
		'is_enabled' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'first_name',
		'last_name',
		'email',
		'email_verified_at',
		'password',
		'avatar',
		'access_all_warehouses',
		'is_enabled',
		'remember_token'
	];

	public function ordered_products()
	{
		return $this->hasMany(OrderedProduct::class, 'assigned_user_id');
	}

	public function payment_transactions()
	{
		return $this->hasMany(PaymentTransaction::class, 'created_by');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'created_by');
	}

	public function status_histories()
	{
		return $this->hasMany(StatusHistory::class, 'changed_by');
	}
}
