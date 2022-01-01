<?php

namespace App\Services\BotService\Technicians;

use App\Contracts\ChatStrategy;
use App\Http\Controllers\Api\ShopItemsController;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use Illuminate\Http\Request;

class Technicians implements ChatStrategy
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
        switch ($request["object"]["payload"]["Technicians"]){
            case "MyTechnicians":
                return(new MyTechnicians())->HandleMessage($request);
            case "LearnTechnicians":
                return(new LearnTechnicians())->HandleMessage($request);
            default:
                break;
        }
    }

}
