<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UsersItem
 *
 * @property int $id
 * @property int $item_id
 * @property int $shinobi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereShinobiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @property-read \App\Models\Item $items
 * @method static \Illuminate\Database\Eloquent\Builder|UsersItem whereStatus($value)
 */
class UsersItem extends Model
{
    use HasFactory;

    protected $table = 'pivot_user_items';

    protected $fillable = [
        "item_id",
        "shinobi_id",
        "status"
    ];

    public function items(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class, "item_id");
    }

}
