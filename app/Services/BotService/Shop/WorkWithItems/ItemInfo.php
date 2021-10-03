<?php

namespace App\Services\BotService\Shop\WorkWithItems;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VKPhotoController;
use App\Models\Item;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\Regex;
use Illuminate\Http\Request;

class ItemInfo implements ChatStrategy
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
        $pair = (new Regex())->regex("*", $request["object"]["payload"]["ShopItemId"]);
        $attachments = (new ItemController())->index($request, $pair[0]);
        $item = Item::whereId($pair[0])->first();

        $data = array('callback,{"BuyItemId": "' . $item["id"] . '*' . $item["price"] . '"}, Купить за ' . $item["price"] . ' рье', 'callback,{"TentenPage": "' . $pair [1] . '*TentenShop"},Назад');
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
        $encodedKeyboard = json_encode($keyboard);

        $text = "🐲 " . $item["item_name"] . " 🐲 \n";
        $text .= "🌀 Ниндзюцу: +" . $item["ninjutsu"] . " ед. 🌀 \n";
        $text .= "🤜🏻 Тайдзюцу: +" . $item["taijutsu"] . " ед. 🤛🏻 \n";
        $text .= "👁 Гендзюцу: +" . $item["genjutsu"] . " ед. 👁 \n";
        return ["text" => $text,
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
            'attachments' => $attachments
        ];

    }
}
