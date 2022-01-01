<?php

namespace App\Services\BotService\Help;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Models\Administrator;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class AdministrationService implements ChatStrategy
{

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
            $admins = Administrator::where("status", "active")->get();
            $link_on_admins= array();
            if (count($admins) > 0){
                foreach ($admins as $admin){
                    $vk_link = $this->regex($admin);
                    $vk_link = "🔔" . $admin->role . " - [" . $vk_link . "|" . $admin->name . "]";
                    $link_on_admins[] = $vk_link;
                }
            }

            $text =  "👺 Администрация проекта 👺\n💢💢💢💢💢💢💢💢💢💢💢💢💢 \n";

            foreach ($link_on_admins as $link_on_admin){
                $text .= $link_on_admin . "\n";
            }

            $text .= "💢💢💢💢💢💢💢💢💢💢💢💢💢";

            return ["text" => $text,
                "keyboard_status" => false,
            ];
        }
    }

    public function regex($admin){
        $re = '/\/(\w+)$/m';
        $str = $admin->vk_link;

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

        return $matches[0][1];
    }
}
