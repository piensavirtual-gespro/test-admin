<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $table = 'address_book';

    protected $primaryKey = 'address_book_id';

    const UPDATED_AT = 'ultima_modificacion';
    const CREATED_AT = null;

    protected $fillable = [
        "address_book_id",
        "customers_id",
        "entry_gender",
        "entry_company",
        "entry_firstname",
        "entry_lastname",
        "entry_street_address",
        "entry_city",
        'entry_postcode',
        "entry_country_id",
        "entry_state",
        "entry_zone_id",
        "ultima_modificacion"
    ];

    protected $attributes = [
        'address_book_id' => 0,
        'customers_id' => '',
        'entry_gender' => '',
        'entry_company' => '',
        'entry_lastname' => '',
        'entry_firstname' => '',
        'entry_street_address' => '',
        'entry_city' => '',
        'entry_postcode' => '',
        'entry_state' => '',
        'entry_country_id' => 195,
        'entry_zone_id' => 0,
        'ultima_modificacion' => '',
    ];

    public function countrie()
    {
        return $this->hasOne(Country::class, 'countries_id', 'entry_country_id');
    }

    public function zone()
    {
        return $this->hasOne(Zone::class, 'zone_id', 'entry_zone_id');
    }
}
