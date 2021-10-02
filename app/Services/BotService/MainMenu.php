<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class MainMenu implements ChatStrategy
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
                    "label" => "Локации"],
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

    public function HandleMessage(Request $request): array
    {
        $status = (new UserController())->CheckUser($request);
        if ($status == "Successful addition") {
            $data = array('text,{"button": "1"},Начать');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "Вам нужно для начала написать команду: Начать ",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        } else {
            $user = ShinobiUser::wherePeerId($request["object"]["message"]["peer_id"])->first();
            $data = array();
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data);
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "🐲 Выход в главное меню 🐲",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }
    }
}
