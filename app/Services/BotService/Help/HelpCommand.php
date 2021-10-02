<?php

namespace App\Services\BotService\Help;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class HelpCommand implements ChatStrategy
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
        if ($status == "Successful addition"){
            $data = array('text,{"button": "1"},Начать');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);
            return ["text" => "Вам нужно для начала написать команду: Начать ",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{
            return ["text" => "
⚠Список доступных команд:⚠\n
💢💢💢💢💢💢💢💢💢💢💢💢💢
🎁 Администрация (Список администрации проекта, тут вы можете узнать к кому обращаться если что-то непонятно.)
🎁 Локации - Список доступных для похода мест
🎁 Профиль - выводит информацию о вашем аккаунте в боте
🎁 Задания - тут вы сможете брать разнообразные задания и выполнять их, за выполненные задания вы будете получать награду
🎁 Магазин - бот отправит вам все доступные для покупки предметы на данный момент.
💢💢💢💢💢💢💢💢💢💢💢💢💢💢
🎁Прокачка(Помощь по системе уровней и прокачки персонажа!)
🎁Чунины (Расскажет как соединить двух генинов в чунина)
💢💢💢💢💢💢💢💢💢💢💢💢💢💢
Ивенты:
🎁Викторина (для старта викторины)
🎁Награды лис(расскажет вам что писать боту и какие награды вы получите)
💢💢💢💢💢💢💢💢💢💢💢💢💢💢",
                "keyboard_status" => false,
            ];
        }
    }
}



