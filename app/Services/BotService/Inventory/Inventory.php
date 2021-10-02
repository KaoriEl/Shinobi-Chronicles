<?php

namespace App\Services\BotService\Inventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\UserItemController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Inventory implements ChatStrategy
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
        $result = (new UserItemController())->paginate($user["id"]);
        $data = array();
        for ($i = 1; $i <= $result; $i++) {
            array_push($data,'callback,{"InventoryPage": "' . $i . '"},'. $i .'');
        }
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 3);
        $encodedKeyboard = json_encode($keyboard);
        return ["text" => "🐲 Ваш инвентарь. 🐲\n⚖ Выберите какую страницу инвентаря просмотреть.\n💵 Баланс: " . $user["money"] . " Рье",
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard
        ];

    }
}
