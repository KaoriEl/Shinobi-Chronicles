<?php

namespace App\Services\BotService\MessageEvent;

use App\Contracts\ChatStrategy;
use App\Models\ShinobiUser;
use App\Services\BotService\Inventory\Inventory;
use App\Services\BotService\Inventory\InventoryPage;
use App\Services\BotService\Shop\Tenten\TentenPage;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\VkMethods;


class EventContext
{
    private $strategy;
    private array $keyboard;

    public function __construct(ChatStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public static function CreateFromContext($request)
    {
        (new VkMethods())->sendMessageEventAnswer($request["object"]["user_id"],$request["object"]["peer_id"],$request["object"]["event_id"]);
        if (isset($request["object"]["payload"]["TentenPage"])){
            return (new TentenPage())->HandleMessage($request);
        }elseif (isset($request["object"]["payload"]["Inventory"])){
            return (new Inventory())->HandleMessage($request);
        }elseif (isset($request["object"]["payload"]["InventoryPage"])){
            return (new InventoryPage())->HandleMessage($request);
        }
    }
}
