<?php

namespace App\Services\BotService;

use App\Contracts\ChatStrategy;
use Illuminate\Http\Request;

class NewConfirmation  implements ChatStrategy
{
    public $confirmation_code;

    function __construct(){
        $this->confirmation_code = config("app.SERVER_RESPONSE_VK_API");
    }

    public function HandleMessage(Request $request): array
    {
        return $confirmation_code = [$this->confirmation_code];
    }

}
