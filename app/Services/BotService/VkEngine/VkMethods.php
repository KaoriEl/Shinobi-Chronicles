<?php

namespace App\Services\BotService\VkEngine;

use CURLFile;
use Illuminate\Support\Facades\Log;

class VkMethods
{
    function vk_send_message($peer_id, $message ,$attachments = array())
    {
        switch ($message["keyboard_status"]){
            case "true":
                if (isset($message["attachments"])){
                    $attachments = $message["attachments"];
                }
                return (new VkConfig())->vkConfig('messages.send', array(
                    'peer_id'    => $peer_id,
                    'message'    => $message["text"],
                    'attachment' => implode(',', $attachments),
                    'random_id' => "0",
                    "keyboard" => $message["reply_markup"]
                ));
            default:
                if (isset($message["attachments"])){
                    $attachments = $message["attachments"];
                }
                Log::channel('debug-channel')->debug("--------vk_config url-------\n" . "Я зашел в элсе" . "\n\n\n");
                return (new VkConfig())->vkConfig('messages.send', array(
                    'peer_id'    => $peer_id,
                    'message'    => $message["text"],
                    'attachment' => implode(',', $attachments),
                    'random_id' => "0",
                ));
        }

    }


    function sendMessageEventAnswer($user_id,$peer_id,$event_id) {
        return (new VkConfig())->vkConfig('messages.sendMessageEventAnswer', array(
            'event_id'    => $event_id,
            'user_id'    => $user_id,
            'peer_id' => $peer_id,
        ));
    }

    function _bot_uploadPhoto($user_id, $file_name) {
        $upload_server_response = (new VkConfig())->vkApi_photosGetMessagesUploadServer($user_id);
        $upload_response = (new VkConfig())->vkApi_upload($upload_server_response['upload_url'], $file_name);

        $photo = $upload_response['photo'];
        $server = $upload_response['server'];
        $hash = $upload_response['hash'];

        $save_response = (new VkConfig())->vkApi_photosSaveMessagesPhoto($photo, $server, $hash);
        $photo = array_pop($save_response);

        return $photo;
    }




    function get_user($from_id)
    {
        return (new VkConfig())->vkConfig('users.get', array(
            'user_ids'    => $from_id,
        ));
    }
}
