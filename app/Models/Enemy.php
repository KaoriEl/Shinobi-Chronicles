<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
