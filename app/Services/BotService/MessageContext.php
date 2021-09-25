<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Services\BotService\GenerateAcc\Register;
use App\Services\BotService\Help\HelpCommand;
use App\Services\BotService\Quests\QuestChoice;
use App\Services\BotService\Shop\ShopInfo;

class MessageContext
{
    private $strategy;

    public function __construct(ChatStrategy $strategy)
    {
        $this->strategy = $strategy;
    }


    public  static function CreateFromContext($request){
        try {
            switch (mb_strtolower($request["object"]["message"]["text"])) {
                case "начать":
                    return (new StartChat())->HandleMessage($request);
                    break;
                case "регистрация":
                    return (new RegisterAccInfo())->HandleMessage($request);
                case "понял":
                    return (new Register())->HandleMessage($request);
                case "/help":
                    return (new HelpCommand())->HandleMessage($request);
                case "профиль":
                    return (new Profile())->HandleMessage($request);
                case "задания":
                    return (new QuestChoice())->HandleMessage($request);
                case "начать бой":
                    return (new Fight())->HandleMessage($request);
                case "магазин":
                    return (new ShopInfo())->HandleMessage($request);
                default:
                    return (new DefaultMessage())->HandleMessage($request);
            }
        } catch (\Exception $ex){
            return json_encode("ERR: " . $ex);
        }


    }
}
