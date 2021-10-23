<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Clan
 *
 * @property int $id
 * @property string $clan_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShinobiUser[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Clan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereClanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clan whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\ShinobiUser|null $users
 */
	class Clan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
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
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereImage($value)
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Quest
 *
 * @property int $id
 * @property string $quests_name
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property int $reward_money
 * @property string $min_bm
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereMinBm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereQuestsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereRewardMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Quest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuestUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $quests_id
 * @property int $shinobi_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereQuestsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereShinobiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestUser whereUpdatedAt($value)
 * @property-read \App\Models\Quest $quests
 * @property-read \App\Models\ShinobiUser $users
 */
	class QuestUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShinobiUser
 *
 * @property int $id
 * @property string $name
 * @property string $step
 * @property int $clan_id
 * @property int $village_id
 * @property int $ninjutsu
 * @property int $taijutsu
 * @property int $genjutsu
 * @property int $money
 * @property int $energy
 * @property string $role
 * @property int $peer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clan[] $clans
 * @property-read int|null $clans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Village[] $village
 * @property-read int|null $village_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereClanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereGenjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereNinjutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser wherePeerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereTaijutsu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereVillageId($value)
 * @mixin \Eloquent
 * @property int $battle_power
 * @method static \Illuminate\Database\Eloquent\Builder|ShinobiUser whereBattlePower($value)
 * @property-read \App\Models\QuestUser|null $active_quests
 */
	class ShinobiUser extends \Eloquent {}
}

namespace App\Models{
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
	class ShopItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
	class UsersItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Village
 *
 * @property int $id
 * @property string $village_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShinobiUser[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Village newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Village query()
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Village whereVillageName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShinobiUser[] $users
 * @property-read int|null $users_count
 */
	class Village extends \Eloquent {}
}

namespace App\Models{
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
	class VkPhoto extends \Eloquent {}
}

