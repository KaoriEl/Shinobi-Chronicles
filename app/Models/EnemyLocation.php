<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnemyLocation extends Model
{
    use HasFactory;

    protected $table = "enemy_item";
    protected $fillable = [
        "enemy_id",
        "location_id",
    ];
}
