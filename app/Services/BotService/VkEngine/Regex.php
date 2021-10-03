<?php

namespace App\Services\BotService\VkEngine;

class Regex
{
    public function regex($separator,$pair)
    {
        return explode($separator, $pair);
    }
}
