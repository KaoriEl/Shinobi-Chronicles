<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EnemyLocation
 *
 * @property int $id
 * @property int $enemy_id
 * @property int $location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation whereEnemyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EnemyLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EnemyLocation extends Model
{
    use HasFactory;

    protected $table = "enemy_location";
    protected $fillable = [
        "enemy_id",
        "location_id",
        "created_at",
        "updated_at"
    ];
}
