<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
    use HasFactory;

    protected $table = 'customers_info';

    protected $primaryKey = 'customers_info_id';

    const CREATED_AT = 'customers_info_date_account_created';

    const UPDATED_AT = 'customers_info_date_of_last_logon';

    protected $fillable = [

        'customers_id',
        'customers_info_date_of_last_logon',
        'customers_info_date_account_created',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'customers_info_id');
    }

    public static function boot()
    {
        parent::boot();
    }
}
