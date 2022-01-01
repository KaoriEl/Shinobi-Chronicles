<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Models\ShinobiUser;
use App\Models\VkPhoto;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;

class Profile implements ChatStrategy
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
        if ($status == "Successful addition") {
            $data = array('text,{"button": "1"},Начать');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "Вам нужно для начала написать команду: Начать ",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        } else {
            $attachments = (new VkPhotoService())->index($request, "ChakraSheme.png", "Profile");
            $user = ShinobiUser::wherePeerId($request["object"]["message"]["peer_id"])->first();
            $data = array('callback,{"Inventory": "inventory"},👤 Инвентарь','callback,{"Technicians": "MyTechnicians"},👤 Техники','callback,{"Technicians": "LearnTechnicians"},㉆ Техники');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "base", false, true, 0);;
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "
👤 Ваш профиль 👤
👑 Имя пользователя: " . $user->name . "
📖 Клан: " . $user->clans["clan_name"] . " 📖
🏡 Деревня: " . $user->village["village_name"] . "  🏡
🌀 Ниндзюцу: " . $user->ninjutsu . " ед. 🌀
🤜🏻 Тайдзюцу: " . $user->taijutsu . " ед. 🤛🏻
👁 Гендзюцу: " . $user->genjutsu . " ед. 👁
💵 Деньги: " . $user->money . " 💵
⚡ Энергия: " . $user->energy . "  ⚡
💪🏻 БМ: " . $user->battle_power . "  💪🏻
",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard,
                'attachments' => $attachments
            ];
        }
    }
}
