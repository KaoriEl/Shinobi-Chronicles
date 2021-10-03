<?php

namespace App\Services\BotService\Shop\Tenten;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\ShopItemsController;
use App\Http\Controllers\VKPhotoController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\Regex;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TentenPage implements ChatStrategy
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
        $user = ShinobiUser::wherePeerId($request["object"]["peer_id"])->first();
        $pair = (new Regex())->regex("*", $request["object"]["payload"]["TentenPage"]);
        $response = Http::get('http://' . env("API_DOMAIN") . '/api/items/' . $pair[1] . '?page=' . $pair[0]);
        $items = $response->json();
        if (count($items) > 0) {
            $attachments = (new VKPhotoController())->index($request, "TentenPage.jpg", "TentenPage");
            $data = array();
            foreach ($items as $item) {
                array_push($data, 'callback,{"ShopItemId": "' . $item["id"] . '*' . $pair[0] . '"},' . $item["item_name"] . ' - '
                    . $item["price"] . ' ' . $item["currency"] . ' ');
            }
            array_push($data, 'callback,{"TentenPage": "' . ($pair[0] + 1) . '*TentenShop"},Далее');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, false, 0);;
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Страница № " . $pair[0] . " 🐲\n⚖ Для вас, мой дорогой, только лучшие товары.\n💵 Баланс: " . $user["money"] . " Рье",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard,
                'attachments' => $attachments
            ];
        } else {
            $attachments = (new VKPhotoController())->index($request, "ShopCommon.jpg", "ShopCommon");
            $result = (new ShopItemsController())->paginate("TentenShop");
            $data = array();
            for ($i = 1; $i <= $result; $i++) {
                array_push($data, 'callback,{"TentenPage": "' . $i . '*TentenShop"},' . $i . '');
            }
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Страница № " . $pair[0] . " 🐲\n⚖ На данной странице нет предметов.\n💵 Баланс: " . $user["money"] . " Рье",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard,
                'attachments' => $attachments
            ];
        }

    }
}
