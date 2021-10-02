<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopItem
 *
 * @property int $id
 * @property int $item_id
 * @property string $status
 * @property string $shop
 * @property int $price
 * @property string $currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Item $items
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereShop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShopItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_id",
        "status",
        "shop",
    ];


    public function items(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class, "item_id");
    }

}
