<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Quest
 *
 * @property int $id
 * @property string $quests_name
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property int $reward_money
 * @property string $min_bm
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereMinBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereQuestsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereRewardMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Quest extends Model
{
    use HasFactory;
    protected $fillable = [
        "quests_name",
        "ninjutsu",
        "taijutsu",
        "genjutsu",
        "reward_money",
        "min_bm",
        "status",
    ];
}
