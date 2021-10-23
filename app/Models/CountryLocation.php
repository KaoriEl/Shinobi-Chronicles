<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
