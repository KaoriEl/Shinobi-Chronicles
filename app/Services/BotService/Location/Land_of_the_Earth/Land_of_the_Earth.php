<?php

namespace App\Services\BotService\Location\Land_of_the_Earth;

use App\Contracts\ChatStrategy;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Land_of_the_Earth implements ChatStrategy
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

        $attachments = (new VkPhotoService())->index($request, "Land_of_Earth.png", "Land_of_Earth");
        $text = "🐲 Вы прибыли в Страну Земли\n";
        $text .= "🐲 Где будете искать приключения?\n";
        $data = array(
            'callback,{"LocationEarth": "Victory stone"},Камень победы',
            'callback,{"LocationEarth": "Arena of Stone"},Арена Камня',
            'callback,{"LocationEarth": "Tailless Lair"},Логово Бесхвостого',
            'callback,{"LocationEarth": "Oasis of Stone"},Оазис Камня',
            'callback,{"LocationEarth": "Hidden Stone Village"},🏣 Скрытого Камня',
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
