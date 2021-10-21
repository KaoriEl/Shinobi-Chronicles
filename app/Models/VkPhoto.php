<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VkPhoto
 *
 * @property int $id
 * @property string $photo
 * @property string $Class
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VkPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $class
 */
class VkPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'Class',
    ];
}
