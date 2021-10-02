<?php

namespace App\Services\BotService\Shop;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\ShopItemsController;
use App\Models\ShinobiUser;
use App\Models\ShopItem;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class ShopCommon implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "inline" => true,
            "buttons" => [[
            ]]
        ];
    }



    public function HandleMessage(Request $request): array
    {
        $result = (new ShopItemsController())->paginate("TentenShop");
        $user = ShinobiUser::wherePeerId($request["object"]["message"]["peer_id"])->first();
        $data = array();
        for ($i = 1; $i <= $result; $i++) {
            array_push($data,'callback,{"TentenPage": "' . $i . '*TentenShop"},'. $i .'');
        }
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 3);
        $encodedKeyboard = json_encode($keyboard);
        return ["text" => "🐲 Здравствуйте, вы попали в лавку Тентен. 🐲\n⚖ Выбирайте снаряжение с умом.\n💵 Баланс: " . $user["money"] . " Рье",
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard
        ];
    }
}
