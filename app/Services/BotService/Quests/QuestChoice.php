<?php

namespace App\Services\BotService\Quests;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Models\Quest;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class QuestChoice implements ChatStrategy
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
            $attachments = (new VkPhotoService())->index($request, "MissionDesk.png", "QuestChoice");
            $user = (new UserController())->GetUser($request);
            $quests = Quest::whereStatus("active")->get();
            $data = array();

            if (count($quests) > 0){
                foreach ($quests as $quest){
                    array_push($data, 'callback,{"QuestName": "'. $quest["id"] .'"},'.$quest["quests_name"].'');
                }
                $text = "

🏣 Вы поднимаетесь в Резиденцию Каге.
Заходя в главный зал, вы попадаете в комнату ожидания, вокруг вас много шиноби и все они ждут задания.
Вы встаете в очередь и ожидаете...

🕐 🕑 🕒

🕓 🕔

🕕

👣 Вы наконец дождались и можете зайти в кабинет каге, для получения миссии.
👤💬 Каге: Здравствуй " . $user["name"] . " сегодня для тебя доступно несколько заданий, вот они на столе можешь рассмотреть их и выбрать нужное тебе.
Стол с миссиями:";
            }else{
                $keyboard_status = false;
                $text = "Эх, сегодня у Каге нет новых заданий для вас.";

            }

            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, false, 0);
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => $text,
                "keyboard_status" => $keyboard_status ?? "true",
                'reply_markup' => $encodedKeyboard,
                'attachments' => $attachments
            ];
        }
    }

}
