<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $table = 'customers';

    protected $primaryKey = 'customers_id';

    const CREATED_AT = null;

    const UPDATED_AT = null;

    protected $fillable = [
        'customers_id',
        'customers_firstname',
        'customers_lastname',
        'customers_email_address',
        'customers_default_address_id',
        'customers_telephone',
        'customers_dni',
        'customers_email_format',
        'customers_group_pricing',
        'customers_authorization',
        'customers_referral',
        'recargo',
        'customers_profesional',
        'customers_iva_intra',
        'customers_type',
        'customers_iva_intra_account',
        'discount1_eurowin',
        'discount2_eurowin',
    ];

    public function customerInfo()
    {
        return $this->hasOne(CustomerInfo::class, 'customers_info_id', 'customers_id');
    }

    public function addressbooks()
    {
        return $this->hasMany(AddressBook::class, 'customers_id', 'customers_id');
    }
}
