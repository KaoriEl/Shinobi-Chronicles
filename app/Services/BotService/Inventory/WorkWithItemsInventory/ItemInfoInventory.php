<?php

namespace App\Services\BotService\Inventory\WorkWithItemsInventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\ItemController;
use App\Models\Item;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemInfoInventory implements ChatStrategy
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
        $pair = (new Regex())->regex("*", $request["object"]["payload"]["itemInventoryId"]);
        $attachments = (new ItemController())->index($request, $pair[0]);
        $item = Item::whereId($pair[0])->first();
        switch ($pair[3]){
            case "active":
                $data = array('callback,{"UnEquipItemId": "' . $pair[2] . '"}, Снять ', 'callback,{"InventoryPage": "' . $pair [1] . '"},Назад');
                break;
            default:
                $data = array('callback,{"EquipItemId": "' . $pair[2] . '"}, Надеть ', 'callback,{"InventoryPage": "' . $pair [1] . '"},Назад');
        }

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
