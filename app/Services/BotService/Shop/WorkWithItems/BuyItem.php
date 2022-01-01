<?php

namespace App\Services\BotService\Shop\WorkWithItems;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Models\Item;
use App\Models\ShinobiUser;
use App\Models\UsersItem;
use App\Services\BotService\VkEngine\Regex;
use Illuminate\Http\Request;

class BuyItem implements ChatStrategy
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

        $answer = (new UserController())->BuyItem($request);
        $user_info = (new ShinobiUser())->wherePeerId($request["object"]["peer_id"])->first();
        $text = "🐲 Предмет успешно приобретен и перемещен в инвентарь. 🐲 \n";
        if ($answer == "buy complete"){
            $attachments = (new VkPhotoService())->index($request, "YesMoney.jpg", "BuyItem");
            $text = "🐲 Предмет успешно приобретен и перемещен в инвентарь. 🐲 \n";
            $text .= "⚠ Внимание: предметы не экипируются автоматически, нужно зайти в инвентарь и экипировать их.\n";
            $text .= "💵 Баланс: " . $user_info["money"];
        }else{
            $attachments = (new VkPhotoService())->index($request, "noMoney.jpg", "BuyItemNoMoney");
            $text = "⚠ Кажется в вашем кошельке не хватает монет.\n";
            $text .= "💵 Баланс: " . $user_info["money"];
        }
        return ["text" => $text,
            "keyboard_status" => false,
            'attachments' => $attachments
        ];

    }
}
