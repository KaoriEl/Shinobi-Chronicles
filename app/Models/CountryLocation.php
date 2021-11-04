<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CountryLocation
 *
 * @property int $id
 * @property int $country_id
 * @property int $location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country $country
 * @property-read \App\Models\Location $location
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryLocation extends Model
{
    use HasFactory;

    protected $table = "country_location";

    protected $fillable = [
        "country_id",
        "location_id",
    ];

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class, "location_id");
    }
    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, "country_id");
    }
}
