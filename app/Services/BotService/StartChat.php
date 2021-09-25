<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StartChat implements ChatStrategy
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
            $data = array('text,{"button": "1"},Регистрация');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Привет, ты решил сыграть в The Shinobi Chronicles? 🐲\nТогда тебе нужно пройти небольшую регистрацию для создания пресонажа.\n
                Напиши 'Регистрация' и мы начнем",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{
            return ["text" => "🐲 Кажется вы уже зарегистрировались в боте, пожалуйста не пытайтесь обмануть систему. 🐲",
                "keyboard_status" => false];
        }
    }

}

