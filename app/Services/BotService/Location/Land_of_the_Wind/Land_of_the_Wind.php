<?php

namespace App\Services\BotService\Location\Land_of_the_Wind;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\VKPhotoController;
use App\Models\Location;
use App\Services\BotService\GTranslate\Gtranslate;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Land_of_the_Wind implements ChatStrategy
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

        $attachments = (new VKPhotoController())->index($request, "WindCountry.jpg", "WindCountry");
        $text = "🐲 Вы прибыли в Страну Ветра\n";
        $text .= "🐲 Где будете искать приключения?\n";

        $locations = Location::get();
        $data = array();
        foreach ($locations as $location){
            if ((new Gtranslate())->gtranslate($location->country_pivot()->first()->country()->first()->name, 'ru', 'en') == "Country of wind"){
                array_push($data,  'callback,{"Location":"LocationWind"},' . $location["name"]);
            }
        }

        $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
        $encodedKeyboard = json_encode($keyboard);

        return ["text" => $text ,
            "keyboard_status" => true,
            'reply_markup' => $encodedKeyboard,
            'attachments' => $attachments
        ];

    }

}
