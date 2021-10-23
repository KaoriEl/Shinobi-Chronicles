<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnemyItem extends Model
{
    use HasFactory;

    protected $table = "enemy_location";
    protected $fillable = [
        "enemy_id",
        "item_id",
    ];

}
