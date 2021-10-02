<?php

namespace App\Services\BotService\MessageEvent;

use App\Services\BotService\MessageContext;
use App\Services\BotService\NewConfirmation;

class ContextEvent
{

    public $res;
    public static function StrategySelect($request)
    {
            return EventContext::CreateFromContext($request);
    }

}
