<?php

namespace App\Services\BotService\GenerateAcc;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Register implements ChatStrategy
{

    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "buttons" => [[
                ["action" => [
                    "type" => "text",
                    "payload" => '{"button": "1"}',
                    "label" => "Начать бой"],
                    "color" => "default"],
                ["action" => [
                    "type" => "text",
                    "payload" => '{"button": "2"}',
                    "label" => "Профиль"],
                    "color" => "default"],
                ["action" => [
                    "type" => "text",
                    "payload" => '{"button": "3"}',
                    "label" => "Задания"],
                    "color" => "default"]
            ], [["action" => [
                "type" => "text",
                "payload" => '{"button": "4"}',
                "label" => "Магазин"],
                "color" => "default"]
            ]
            ]];

    }

    /**
     * @throws \Exception
     */
    public function HandleMessage(Request $request): array
    {
        $status = (new UserController())->index($request);
        $data = array();
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data);
        $encodedKeyboard = json_encode($keyboard);
        if ($status == "Successful addition"){
            return ["text" => "🐲 Поздравляю! 🐲\n🔥Твой персонаж успешно создан.\n🔥Теперь ты можешь начать игру.\n🔥Для справки по командам напиши /help",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{
            return ["text" => "🐲 Кажется вы уже зарегистрировались в боте, пожалуйста не пытайтесь обмануть систему. 🐲\n",
                "keyboard_status" => false,
            ];
        }

    }
}
