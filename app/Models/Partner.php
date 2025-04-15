<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partner
 * 
 * @property int $id
 * @property int|null $company_id
 * @property int|null $gender_id
 * @property string $partner_type
 * @property string $full_name
 * @property string|null $tax_identifier
 * @property string|null $comments
 * @property Carbon|null $birthday
 * @property bool $birthday_email
 * @property bool $is_enabled
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Company|null $company
 * @property Gender|null $gender
 * @property Collection|Order[] $orders
 * @property Collection|PartnerAddress[] $partner_addresses
 * @property Collection|PartnerEmail[] $partner_emails
 * @property Collection|PartnerPhone[] $partner_phones
 * @property Collection|PurchaseOrder[] $purchase_orders
 * @property Collection|PurchaseReturn[] $purchase_returns
 * @property Collection|Purchase[] $purchases
 * @property Collection|Quotation[] $quotations
 * @property Collection|SaleOrder[] $sale_orders
 * @property Collection|SaleReturn[] $sale_returns
 * @property Collection|Sale[] $sales
 *
 * @package App\Models
 */
class Partner extends Model
{
	use SoftDeletes;
	protected $table = 'partners';

	protected $casts = [
		'company_id' => 'int',
		'gender_id' => 'int',
		'birthday' => 'datetime',
		'birthday_email' => 'bool',
		'is_enabled' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'gender_id',
		'partner_type',
		'full_name',
		'tax_identifier',
		'comments',
		'birthday',
		'birthday_email',
		'is_enabled'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function partner_addresses()
	{
		return $this->hasMany(PartnerAddress::class);
	}

	public function partner_emails()
	{
		return $this->hasMany(PartnerEmail::class);
	}

	public function partner_phones()
	{
		return $this->hasMany(PartnerPhone::class);
	}

	public function purchase_orders()
	{
		return $this->hasMany(PurchaseOrder::class);
	}

	public function purchase_returns()
	{
		return $this->hasMany(PurchaseReturn::class);
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class);
	}

	public function quotations()
	{
		return $this->hasMany(Quotation::class);
	}

	public function sale_orders()
	{
		return $this->hasMany(SaleOrder::class);
	}

	public function sale_returns()
	{
		return $this->hasMany(SaleReturn::class);
	}

	public function sales()
	{
		return $this->hasMany(Sale::class);
	}
}
