<?php

namespace App\Services\BotService\NotFound;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class NotFound implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "buttons" => [[
            ]]];

    }

    public function HandleMessage(Request $request): array
    {
        $status = (new UserController())->CheckUser($request);
        if ($status == "Successful addition"){
            $data = array('text,{"button": "1"},Начать');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "Вам нужно для начала написать команду: Начать ",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{
            return ["text" => "🚫 Этот функционал еще в разработке",
                "keyboard_status" => false,
            ];
        }
    }

}
