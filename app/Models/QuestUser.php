<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\QuestUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $quests_id
 * @property int $shinobi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereQuestsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereShinobiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereUpdatedAt($value)
 * @property-read \App\Models\Quest $quests
 * @property-read \App\Models\ShinobiUser $users
 */
class QuestUser extends Model
{
    use HasFactory;
    protected $fillable = [
        "quests_id",
        "shinobi_id",
    ];

    protected $table = "pivot_user_quests";

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ShinobiUser::class, "shinobi_id");
    }
    public function quests(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Quest::class, "quests_id");
    }

}
