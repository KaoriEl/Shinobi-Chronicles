<?php

namespace App\Services\BotService\Location\Iron_Country;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\VKPhotoController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Iron_Country implements ChatStrategy
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

        $attachments = (new VKPhotoController())->index($request, "Iron_Country.png", "Iron_Country");
        $text = "🐲 Вы прибыли в Страну Железа\n";
        $text .= "🐲 Где будете искать приключения?\n";
        $data = array(
            'callback,{"LocationIron": "Samurai Bridge"},Мост Самураев',
            'callback,{"LocationIron": "Snow city"},Снежный город',
            'callback,{"LocationIron": "Snowy glade"},Снежная поляна',
            'callback,{"LocationIron": "Mount fuji"},Гора фудзи',
            'callback,{"LocationIron": "Samurai temple"},🏣 Храм самурая',
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
