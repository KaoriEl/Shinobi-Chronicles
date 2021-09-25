<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class RegisterAccInfo implements ChatStrategy
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
            $data = array('text,{"button": "1"},Понял');
            $keyboard = (new KeyboardGenerate($this->keyboard))->generate($data, "new");
            $encodedKeyboard = json_encode($keyboard);

            return ["text" => "🐲 Давай я тебе расскажу о процессе регистрации 🐲\n1. Персонаж генерируется рандомно.\n2. Имя вашего персонажа будет равно вашему имени в вк, изменить его невозможно во избежание 'рофло ников'\n3. Регистрация доступна только 1 раз для одного аккаунта.\n4. Напиши 'Понял' и твой персонаж создатся",
                "keyboard_status" => true,
                'reply_markup' => $encodedKeyboard
            ];
        }else{
            return ["text" => "🐲 Кажется вы уже зарегистрировались в боте, пожалуйста не пытайтесь обмануть систему. 🐲\n",
                "keyboard_status" => false,
            ];
        }

    }
}
