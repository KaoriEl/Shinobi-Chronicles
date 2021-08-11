<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public $bot_api_token;
    public $api_version;
    public $endpoint;

    function __construct(){
        $this->bot_api_token = env("VK_BOT_API_KEY");
        $this->endpoint = env("VK_API_ENDPOINT");
        $this->api_version = env("VK_API_VERSION");
    }

    public function index($request) {
        $peer_id = $request["object"]["message"]["peer_id"];
        switch (mb_strtolower($request["object"]["message"]["text"])) {
            case "начать":
                $text = "Привет, ты решил сыграть в The Shinobi Chronicles?\nТогда тебе нужно пройти небольшую регистрацию для создания пресонажа. \n
                Напиши 'Регистрация' и мы начнем ";
                $this->vk_send_message($peer_id, $text);
                echo('ok');
                break;
            case "регистрация":
                $text = "Как тебя зовут шиноби? \n Напиши - Мое имя: %твой ник в игре%";
                $this->vk_send_message($peer_id, $text);
                echo('ok');
                break;
            default:
                $text = "Я еще не знаю такой команды, попробуй позже";
                $this->vk_send_message($peer_id, $text);
                echo('ok');
                break;
        }
    }

    function vkConfig($method, $params = array()) {
        $params['access_token'] = $this->bot_api_token;
        $params['v'] = $this->api_version ;

        $query = http_build_query($params);
        $url = $this->endpoint.$method.'?'.$query;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
          return $error;
        }

        curl_close($curl);

        $response = json_decode($json, true);
        if (!$response || !isset($response['response'])) {
            Log::emergency($json);
        }

        return $response['response'];
    }

    function vk_send_message($peer_id, $message, $attachments = array()) {
        return $this->vkConfig('messages.send', array(
            'peer_id'    => $peer_id,
            'message'    => $message,
            'attachment' => implode(',', $attachments),
            'random_id' => "0"
        ));
    }
}
