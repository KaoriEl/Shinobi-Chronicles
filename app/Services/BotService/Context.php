<?php

namespace App\Services\BotService;

class Context
{
    public $res;
    public static function StrategySelect($request)
    {
        if ($request["type"] == "confirmation"){
             return (new NewConfirmation())->HandleMessage($request);
        }
        else {
            return MessageContext::CreateFromContext($request);
        }
    }

}
