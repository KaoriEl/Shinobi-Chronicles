<?php

namespace App\Services\BotService\Location\Land_of_Water;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\VKPhotoController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Land_of_Water implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "inline" => true,
            "buttons" => [[
            ]]];

    }

    public function HandleMessage(Request $request): array
    {

        $attachments = (new VKPhotoController())->index($request, "Land_of_Water.png", "Land_of_Water");
        $text = "🐲 Вы прибыли в Страну Воды\n";
        $text .= "🐲 Где будете искать приключения?\n";
        $data = array(
            'callback,{"LocationWater": "Unknown Island"},Неизвестный Остров',
            'callback,{"LocationWater": "Underwater temple"},Подводный храм',
            'callback,{"LocationWater": "Beach cave"},Пляжная пещера',
            'callback,{"LocationWater": "Beach"},Пляж',
            'callback,{"LocationWater": "Hidden Mist Village"},🏣 Скрытого Тумана',
        );
        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
        $encodedKeyboard = json_encode($keyboard);

        return ["text" => $text ,
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
            'attachments' => $attachments
        ];

    }

}
