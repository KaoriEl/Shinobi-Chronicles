<?php

namespace App\Services\BotService\Location\Land_of_Sound;

use App\Contracts\ChatStrategy;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Land_of_Sound implements ChatStrategy
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

        $attachments = (new VkPhotoService())->index($request, "Land_of_Sound.jpg", "Land_of_Sound");
        $text = "🐲 Вы прибыли в Страну Звука\n";
        $text .= "🐲 Где будете искать приключения?\n";
        $data = array(
            'callback,{"LocationSound": "Rice field"},Рисовое поле',
            'callback,{"LocationSound": "Land of Sound"},Деревня звука',
            'callback,{"LocationSound": "Orochimaru Lair"},Логово Орочимару',
            'callback,{"LocationSound": "Valley of Sound"},Долина звука',
            'callback,{"LocationSound": "Daimyo building"},Здание даймё',
            'callback,{"LocationSound": "Jugo Lair"},Логово Джуго',
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
