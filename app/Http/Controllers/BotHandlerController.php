<?php

namespace App\Http\Controllers;

use App\Services\BotService\Context;
use App\Services\BotService\MessageEvent\ContextEvent;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mime\MessageConverter;

class BotHandlerController extends Controller
{
    private $confirmation_code;

    function __construct(){
        $this->confirmation_code = env("SERVER_RESPONSE_VK_API");
    }

    function authVkBot(Request $request){
        Log::channel('debug-channel')->debug("--------message_new-------\n" . $request . "\n\n\n");
        switch ($request["type"]){
            case "confirmation":
                $response = Context::StrategySelect($request);
                echo $response[0];
                break;
            case "message_new":
                $msg = Context::StrategySelect($request);
                try{
                    (new VkMethods())->vk_send_message($request["object"]["message"]["peer_id"], $msg);
                }catch(\Exception $err){
                    Log::channel('error-channel')->debug("--------(new VkSendMsg())->vk_send_message-------\n" . $err . "\n\n\n");
                }
                echo('ok');
                break;
            case "message_event":
                $msg = ContextEvent::StrategySelect($request);
                try{
                    (new VkMethods())->vk_send_message($request["object"]["peer_id"], $msg);
                }catch(\Exception $err){
                    Log::channel('error-channel')->debug("--------(new VkSendMsg())->vk_send_message-------\n" . $err . "\n\n\n");
                }
                echo('ok');

        }
    }

}
