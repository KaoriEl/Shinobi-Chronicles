<?php

namespace App\Services\BotService\Inventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\UserItemController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InventoryPage implements ChatStrategy
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
        $response = Http::get('http://' . env("API_DOMAIN") . '/api/user_items/' . $user["id"] . '?page=' . $request["object"]["payload"]["InventoryPage"]);
        $items = $response->json();
        if (count($items) > 0) {
            $data = array();
            foreach ($items as $item) {
                switch ($item["status"]){
                    case "active":
                        $status = "Надето";
                        break;
                    default:
                        $status = "Не надето";
                        break;
                }
                array_push($data, 'callback,{"itemId": "' . $item["items"]["id"] . '"},' . $item["items"]["item_name"] . ' - '
                    . $status . '');
            }
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data,"base",false,false,0);;
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Инвентарь: Страница № " . $request["object"]["payload"]["InventoryPage"] . " 🐲\n⚖ Нажмите на предмет для взаимодействия с ним.",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{

            $result = (new UserItemController())->paginate($user["id"]);
            $data = array();
            for ($i = 1; $i <= $result; $i++) {
                array_push($data,'callback,{"InventoryPage": "' . $i . '"},'. $i .'');
            }
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data,"base",false,true,0);;
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Страница № ".$pair[0] ." 🐲\n⚖ На данной странице нет предметов." ,
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }

    }
}
