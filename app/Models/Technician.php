<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Technician
 *
 * @property int $id
 * @property string $name
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property string $effect
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Technician newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technician newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technician query()
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereEffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technician whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "ninjutsu",
        "taijutsu",
        "genjutsu",
        "effect",
        "status",
        "created_at",
        "updated_at",
    ];

}
