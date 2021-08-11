<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mime\MessageConverter;

class BotHandlerController extends Controller
{
    private $confirmation_code;

    function __construct(){
        $this->confirmation_code = env("SERVER_RESPONSE_VK_API");
    }

    function authVkBot(Request $request){
        if (isset($request)){
            switch ($request["type"]){
                case "confirmation":
                    echo $this->confirmation_code; // отправляем строку для подтверждения адреса
                    break;
                case "message_new":
                $msg = new MessageController();
                $msg->index($request);

            }

        }
    }
}
