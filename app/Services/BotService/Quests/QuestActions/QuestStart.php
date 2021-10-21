<?php

namespace App\Services\BotService\Quests\QuestActions;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuestController;
use Illuminate\Http\Request;

class QuestStart implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "inline" => true,
            "buttons" => [[
            ]]
        ];

    }

    public function HandleMessage(Request $request): array
    {
        $equip = (new QuestController())->start($request);
        if ($equip == "ok") {
            $text = "🐲 Вы взяли задание, на его выполнение потребуется 5-6 минут, после чего вы получите уведомление о выполненом задании 🐲 \n";
        } else {
            $text = "🐲 Вы слишком устали чтоб брать еще задания, приходите завтра";
        }
        return ["text" => $text,
            "keyboard_status" => false,
        ];
    }

}
