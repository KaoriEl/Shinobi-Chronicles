<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VKPhotoController;
use App\Models\Country;
use App\Services\BotService\GTranslate\Gtranslate;
use App\Services\BotService\Location\LocationService;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Location implements ChatStrategy
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
            $check_lockdown = (new LocationService())->index($request);

            if ($check_lockdown == "Quest active"){
                $text = "🚫 Вы все еще на задании!\n";
                $text .= "🚫 Невозможно путешествовать и сражаться во время заданий";
                return ["text" => $text ,
                    "keyboard_status" => false,
                ];
            }else{
                $attachments = (new VKPhotoController())->index($request, "MapNaruto.jpg", "MapNaruto");
                $text = "🐲 Вы стоите у ворот своей деревни, и перед вами открываются огромные виды\n";
                $text .= "🐲 Что же делать дальше? Куда мне пойти? Кем стать?\n";
                $text .= "🐲 Множество подобных вопросов возникает у вас в голове, вам нужно выбрать свой путь ниндзя и следовать по нему.\n";
                $test2 = Country::get();
                $data = array();
                foreach ($test2 as $t){
                    array_push($data,  'callback,{"Location":"' . (new Gtranslate())->gtranslate($t["name"], 'ru', 'en') . '"},' . $t["name"]);
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
    }

}
