<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $table = 'zones';

    protected $primaryKey = 'zone_id';

    protected $foreignKey = 'zone_country_id';

    const CREATED_AT = null;

    const UPDATED_AT = null;

    protected $fillable = [
        'zone_id',
        'zone_country_id',
        'zone_code',
        'zone_name',
        'digitos_postal',
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'zone_name' => Like::class,
        'countries.countries_name' => Like::class,
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'zone_id',
        'zone_name',
        'zone_code',
        'digitos_postal',
        'countries.countries_name',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'zone_country_id', 'countries_id');
    }
}
