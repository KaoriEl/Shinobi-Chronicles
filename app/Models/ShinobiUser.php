<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShinobiUser
 *
 * @property int $id
 * @property string $name
 * @property string $step
 * @property int $clan_id
 * @property int $village_id
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property int $money
 * @property int $energy
 * @property string $role
 * @property int $peer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clan[] $clans
 * @property-read int|null $clans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Village[] $village
 * @property-read int|null $village_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser wherePeerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereVillageId($value)
 * @mixin \Eloquent
 * @property int $battle_power
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereBattlePower($value)
 */
class ShinobiUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "step",
        "clan",
        "ninjutsu",
        "taijutsu",
        "genjutsu",
        "battle_power",
        "peer_id",
    ];

    public function clans(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Clan::class, "clan_id");
    }

    public function village(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Village::class, "village_id");
    }

}
