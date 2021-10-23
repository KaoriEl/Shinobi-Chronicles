<?php

namespace App\Services\BotService\Location\Land_of_Lightning;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\VKPhotoController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Land_of_Lightning implements ChatStrategy
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

        $attachments = (new VKPhotoController())->index($request, "Land_of_Lightning.png", "Land_of_Lightning");
        $text = "🐲 Вы прибыли в Страну Молний\n";
        $text .= "🐲 Где будете искать приключения?\n";
        $data = array(
            'callback,{"LocationEarth": "Arena Clouds"},Арена Облака',
            'callback,{"LocationEarth": "Daimyo building"},Здание даймё',
            'callback,{"LocationEarth": "Turtle island"},Остров Черепахи',
            'callback,{"LocationEarth": "Valley of Clouds and Lightning"},Долина Облаков',
            'callback,{"LocationEarth": "Hidden Cloud Village"},🏣 Скрытого Облака',
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
