<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use App\Services\BotService\GenerateAcc\Register;
use App\Services\BotService\Help\AdministrationService;
use App\Services\BotService\Help\HelpCommand;
use App\Services\BotService\Quests\QuestChoice;
use App\Services\BotService\Shop\ShopCommon;
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
                case "faq":
                    return (new HelpCommand())->HandleMessage($request);
                case "администрация":
                    return (new AdministrationService())->HandleMessage($request);
                case "профиль":
                    return (new Profile())->HandleMessage($request);
                case "задания":
                    return (new QuestChoice())->HandleMessage($request);
                case "локации":
                    return (new Location())->HandleMessage($request);
                case "магазин":
                    return (new ShopInfo())->HandleMessage($request);
                case "главное меню":
                    return (new MainMenu())->HandleMessage($request);
                case "обычный магазин":
                    return (new ShopCommon())->HandleMessage($request);
                case "донат магазин":
                    return (new NotFound\NotFound())->HandleMessage($request);
                default:
                    return (new DefaultMessage())->HandleMessage($request);
            }
        } catch (\Exception $ex){
            return json_encode("ERR: " . $ex);
        }


    }
}
