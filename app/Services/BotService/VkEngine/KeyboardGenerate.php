<?php

namespace App\Services\BotService\VkEngine;

use Illuminate\Support\Facades\Log;

class KeyboardGenerate
{

    private array $keyboard;

    /**
     * @param $keyboard
     */
    public function __construct($keyboard)
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @param array $data The delimiter for text and callback data is: "," Callback data must be written with a lowercase letter. For example $data = ["text_button,callback_data,text_button,callback_data"];
     * @param string $options  = "base" use a default keyboard, "new" generate a full new keyboard
     * @return array|string[]|void
     */
    public function generate(array $data, string $options = "base", $one_time = false, $split = false, $index = 0, $break_point = 2) {
        switch ($options) {
            case "base":
                Log::channel('debug-channel')->debug(json_encode($data));
                return $this->new_base_keyboard($data,$split,$break_point,$index);
                break;
            case "new":
                return $this->new_keyboard($data,$one_time);
                break;
        }
    }

    /**
     * generate new keyboard based on the base provided in the class
     * @param $data
     * @return array
     */
    public function new_base_keyboard($data,$split,$break_point,$index): array
    {
        $keyboard = $this->keyboard;
        $count = 0;
        if ($split == false) {
            foreach ($data as $pair){
                $torn_pair = $this->regex_data($pair);
                $keyboard["buttons"][$index][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label'=> $torn_pair[2]];
                Log::channel('debug-channel')->debug("--------vk_config curl_error-------\n" . json_encode($keyboard) . "\n\n\n");
                $index++;
            }
        }else{
            $index = 0;
            foreach ($data as $pair){
                if ($count >= $break_point){
                    $break_point = $break_point * 2;
                    $index++;
                }
                $count++;
                $torn_pair = $this->regex_data($pair);
                $keyboard["buttons"][$index][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label'=> $torn_pair[2]];
                Log::channel('debug-channel')->debug("--------vk_config curl_error-------\n" . json_encode($keyboard) . "\n\n\n");

            }
        }

        return $keyboard;
    }

    /**
     * Separate text and callback data
     * @param $pair
     * @return false|string[]
     */
    public function regex_data($pair) {
        return explode(',', $pair);
    }

    /**
     * generate a completely new keyboard not based on the base provided in the class
     * @param $data
     * @return array|string[]
     */
    public function new_keyboard($data,$one_time): array
    {
        $keyboard = ["one_time" => $one_time];
        foreach ($data as $pair){
            $torn_pair = $this->regex_data($pair);
            $keyboard["buttons"][][]["action"] =  ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label'=> $torn_pair[2]] ;
            Log::channel('debug-channel')->debug("--------vk_config curl_error-------\n" . json_encode($keyboard) . "\n\n\n");

        }
        return $keyboard;

    }

    public function default_keyboard(): array
    {
        return $this->keyboard;

    }

}
