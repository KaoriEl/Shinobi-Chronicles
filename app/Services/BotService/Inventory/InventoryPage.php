<?php

namespace App\Services\BotService\Inventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\UserItemController;
use App\Services\MediaService\Photo\VkPhotoService;
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
        $attachments = (new VkPhotoService())->index($request, "inventory.jpg", "Inventory");
        $user = ShinobiUser::wherePeerId($request["object"]["peer_id"])->first();
        $response = Http::get('http://' . env("API_DOMAIN") . '/api/user_items/' . $user["id"] . '?page=' . $request["object"]["payload"]["InventoryPage"]);
        $items = $response->json();
        if (count($items) > 0) {
            $data = array();
            foreach ($items as $item) {
                switch ($item["status"]) {
                    case "active":
                        $status = "Надето";
                        break;
                    default:
                        $status = "Не надето";
                        break;
                }
                array_push($data, 'callback,{"itemInventoryId": "' . $item["items"]["id"] . '*' . $request["object"]["payload"]["InventoryPage"] . '*' . $item["id"] .'*' . $item["status"] . '"},' . $item["items"]["item_name"] . ' - '
                    . $status . '');
            }
            array_push($data, 'callback,{"InventoryPage": "' . ($request["object"]["payload"]["InventoryPage"] + 1) . '"},Далее');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, false, 0);;
            $encodedKeyboard = json_encode($keyboard);
            $text = "🐲 Инвентарь: Страница № " . $request["object"]["payload"]["InventoryPage"] . " 🐲\n⚖ Нажмите на предмет для взаимодействия с ним.";

        } else {
            $result = (new UserItemController())->paginate($user["id"]);
            $data = array();
            for ($i = 1; $i <= $result; $i++) {
                array_push($data, 'callback,{"InventoryPage": "' . $i . '"},' . $i . '');
            }
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
            $encodedKeyboard = json_encode($keyboard);
            $text = "🐲 Страница № " . $pair[0] . " 🐲\n⚖ На данной странице нет предметов.";
        }
        return ["text" => $text,
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
            'attachments' => $attachments
        ];

    }
}
