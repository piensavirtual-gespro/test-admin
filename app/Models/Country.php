<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Types\Like;

class Country extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $table = 'countries';

    protected $primaryKey = 'countries_id';

    const CREATED_AT = null;

    const UPDATED_AT = null;

    protected $fillable = [
        'countries_id',
        'countries_name',
        'countries_iso_code_2',
        'countries_iso_code_3',
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'countries_name' => Like::class,
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'countries_id',
        'countries_name',
        'countries_iso_code_2',
        'countries_iso_code_3',
    ];

    public function zones()
    {
        return $this->hasMany(Zone::class, 'zone_country_id', 'countries_id');
    }


    public function getFlagUrlAttribute()
    {
        return 'https://static.piensavirtual.com/bender/v1/static/flags/' . $this->image;
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->zones()->delete();
        });
    }
}
