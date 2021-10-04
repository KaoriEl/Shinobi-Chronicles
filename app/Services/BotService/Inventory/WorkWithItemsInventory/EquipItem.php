<?php

namespace App\Services\BotService\Inventory\WorkWithItemsInventory;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\ItemController;
use App\Models\UsersItem;
use App\Services\BotService\VkEngine\Regex;
use Illuminate\Http\Request;

class EquipItem implements ChatStrategy
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
        $equip = (new ItemController())->equip($request);
        if ($equip == "ok"){
            $text = "🐲 Предмет надет 🐲 \n";
            $text .= "💥 Поздравляю! Вы стали сильнее \n";
            return ["text" => $text,
                "keyboard_status" => false,
            ];
        }else{
            $text = "🐲 Не получилось надеть предмет 🐲 \n";
            $text .= "⚠ Помните, одновременно может быть надет только один предмет \n";
            return ["text" => $text,
                "keyboard_status" => false,
            ];
        }

    }
}
