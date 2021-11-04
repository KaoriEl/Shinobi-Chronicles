<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Enemy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Enemy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enemy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enemy query()
 * @mixin \Eloquent
 */
class Enemy extends Model
{
    use HasFactory;

    protected $fillable = [
        "ninjutsu",
        "taijutsu",
        "genjutsu",
        "name",
        "reward_money",
        "drop_chance",
        "status",
    ];

}
