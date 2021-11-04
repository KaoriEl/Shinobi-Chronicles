<?php

namespace App\Services\BotService\Technicians;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\ShopItemsController;
use App\Http\Controllers\Api\TechniciansController;
use App\Http\Controllers\VKPhotoController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class LearnTechnicians implements ChatStrategy
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
        $attachments = (new VKPhotoController())->index($request, "ShopCommon.jpg", "ShopCommon");
        $result = (new TechniciansController())->paginate();
//        $user = ShinobiUser::wherePeerId($request["object"]["message"]["peer_id"])->first();
        $data = array();
        for ($i = 1; $i <= $result; $i++) {
            array_push($data, 'callback,{"LearnTechniciansPage": "' . $i . '*LearnTechnician"},' . $i . '');
        }
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 3);
        $encodedKeyboard = json_encode($keyboard);
        return ["text" => "🐲 Функционал в разработке",
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
        ];
    }

}
