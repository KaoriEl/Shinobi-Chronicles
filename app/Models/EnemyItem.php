<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EnemyItem
 *
 * @property int $id
 * @property int $enemy_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem whereEnemyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EnemyItem extends Model
{
    use HasFactory;

    protected $table = "enemy_item";
    protected $fillable = [
        "enemy_id",
        "item_id",
    ];

}
