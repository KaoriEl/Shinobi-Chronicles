<?php

namespace App\Services\BotService\VkEngine;

use Illuminate\Support\Facades\Log;

class VkMethods
{
    function vk_send_message($peer_id, $message ,$attachments = array())
    {
        switch ($message["keyboard_status"]){
            case "true":
                return (new VkConfig())->vkConfig('messages.send', array(
                    'peer_id'    => $peer_id,
                    'message'    => $message["text"],
                    'attachment' => implode(',', $attachments),
                    'random_id' => "0",
                    "keyboard" => $message["reply_markup"]
                ));
            default:
                Log::channel('debug-channel')->debug("--------vk_config url-------\n" . "Я зашел в элсе" . "\n\n\n");
                return (new VkConfig())->vkConfig('messages.send', array(
                    'peer_id'    => $peer_id,
                    'message'    => $message["text"],
                    'attachment' => implode(',', $attachments),
                    'random_id' => "0",
                ));
        }

    }

    function get_user($from_id)
    {
        return (new VkConfig())->vkConfig('users.get', array(
            'user_ids'    => $from_id,
        ));
    }
}
