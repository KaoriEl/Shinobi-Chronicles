<?php

namespace App\Services\BotService\Location;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\UserController;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class DefaultMessageLocation implements ChatStrategy
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

            return ["text" => "🚫 Эта локация еще в разработке",
                "keyboard_status" => false,
            ];

    }

}
