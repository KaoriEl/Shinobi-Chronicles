<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Profile implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "buttons" => [[
            ]]];

    }

    public function HandleMessage(Request $request): array
    {
        $status = (new UserController())->CheckUser($request);
        if ($status == "Successful addition") {
            $data = array('text,{"button": "1"},Начать');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "Вам нужно для начала написать команду: Начать ",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        } else {
            $user = (new UserController())->GetUser($request);
            return ["text" => "
👤 Ваш профиль 👤
👑 Имя пользователя: " . $user->name . "
📖 Клан: " . $user->clan_id . " 📖
🏡 Деревня: " . $user->village_id . "  🏡
🌀 Ниндзюцу: " . $user->ninjutsu . " ед. 🌀
🤜🏻 Тайдзюцу: " . $user->taijutsu . " ед. 🤛🏻
👁 Гендзюцу: " . $user->genjutsu . " ед. 👁
💵 Деньги: " . $user->money . " 💵
⚡ Энергия: " . $user->energy . "  ⚡",
                "keyboard_status" => false,
            ];
        }
    }
}
