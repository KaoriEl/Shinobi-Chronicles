<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServerAuthController extends Controller
{
    private $confirmation_code;
    public $bot_api_token;
    private $secretKey;

    function __construct(){
        $this->confirmation_code = env("SERVER_RESPONSE_VK_API");
        $this->bot_api_token = env("VK_BOT_API_KEY");
        $this->secretKey = env("SECRET_KEY_BOT_API_KEY");
    }
    function index(){
        dd(csrf_token());
    }

    function auth(Request $request){
        if (isset($request)){
            switch ($request["type"]){
                case "confirmation";
                    echo $this->confirmation_code; // отправляем строку для подтверждения адреса
                    break;
            }

        }
    }
}
