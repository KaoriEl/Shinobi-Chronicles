<?php

namespace App\Services\BotService\Shop;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class ShopInfo implements ChatStrategy
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
                    "label" => "Обычный магазин"],
                    "color" => "default"],
                ["action" => [
                    "type" => "text",
                    "payload" => '{"button": "1"}',
                    "label" => "Донат магазин"],
                    "color" => "positive"],

            ],[ ["action" => [
                "type" => "text",
                "payload" => '{"button": "1"}',
                "label" => "Главное меню"],
                "color" => "default"],]
            ]];

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

            $data = array();
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data);
            $encodedKeyboard = json_encode($keyboard);

            return ["text" => "🐲 Пожалуйста, выберите интересующий вас магазин 🐲" ,
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];

        }
    }
}
