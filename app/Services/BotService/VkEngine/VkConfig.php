<?php

namespace App\Services\BotService\VkEngine;

use CURLFile;
use Illuminate\Support\Facades\Log;

class VkConfig
{
    private $bot_api_token;
    private $api_version;
    private $endpoint;

    function __construct(){
        $this->bot_api_token = env("VK_BOT_API_KEY");
        $this->endpoint = env("VK_API_ENDPOINT");
        $this->api_version = env("VK_API_VERSION");
    }


    function vkApi_upload($url, $file_name) {


        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => new CURLfile($file_name)));
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error){
            Log::channel('error-channel')->debug("--------vkApi_upload-------\n" . $error . "\n\n\n");
        }
        curl_close($curl);

        return json_decode($json, true);
    }

    function vkApi_photosGetMessagesUploadServer($peer_id) {
        return $this->vkConfig('photos.getMessagesUploadServer', array(
            'peer_id' => $peer_id,
        ));
    }


    function vkApi_photosSaveMessagesPhoto($photo, $server, $hash) {
        return $this->vkConfig('photos.saveMessagesPhoto', array(
            'photo'  => $photo,
            'server' => $server,
            'hash'   => $hash,
        ));
    }


    function vkConfig($method, $params = array()) {
        $params['access_token'] = $this->bot_api_token;
        $params['v'] = $this->api_version ;

        $query = http_build_query($params);
        $url = $this->endpoint.$method.'?'.$query;


        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {

            Log::channel('error-channel')->debug("--------vk_config curl_error-------\n" . $error . "\n\n\n" . $url . "\n\n\n");
            return $error;
        }

        curl_close($curl);

        $response = json_decode($json, true);
        if (!$response || !isset($response['response'])) {
            Log::channel('error-channel')->debug("--------vk_config json_decode -------\n" . $json . "\n\n\n");
        }
        return $response['response'];
    }
}
