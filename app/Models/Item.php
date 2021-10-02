<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $item_name
 * @property string $item_type
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property string $clan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopItem[] $shops
 * @property-read int|null $shops_count
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereClan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereItemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $price
 * @property string $currency
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item wherePrice($value)
 */
class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_name",
        "item_type",
        "clan",
        "ninjutsu",
        "taijutsu",
        "genjutsu",
        "price",
        "currency",
    ];

    public function shops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ShopItem::class);
    }


}
