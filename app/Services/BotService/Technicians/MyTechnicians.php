<?php

namespace App\Services\BotService\Technicians;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\ShopItemsController;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class MyTechnicians implements ChatStrategy
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
        $data = array('callback,{"Inventory": "inventory"},👤 Инвентарь','callback,{"Technicians": "MyTechnicians"},👤 Техники','callback,{"Technicians": "LearnTechnicians"},㉆ Техники');
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 3);
        $encodedKeyboard = json_encode($keyboard);
        return ["text" => "🐲 Функционал в разработке",
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
        ];
    }

}
