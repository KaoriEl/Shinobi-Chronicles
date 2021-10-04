<?php

namespace App\Services\BotService\Inventory\WorkWithItemsInventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;

class UnEquipItem implements ChatStrategy
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
        $equip = (new ItemController())->unequip($request);
        if ($equip == "ok") {
            $text = "🐲 Предмет снят 🐲 \n";
        } else {
            $text = "🐲 Не получилось снять предмет 🐲 \n";
        }
        return ["text" => $text,
            "keyboard_status" => false,
        ];
    }
}


