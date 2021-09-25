<?php

namespace App\Services\BotService\Quests;

use App\Contracts\ChatStrategy;
use Illuminate\Http\Request;

class QuestRankA implements ChatStrategy
{
    private array $keyboard;

    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "buttons" => [[
            ]]];

    }

    public function HandleMessage(Request $request): array
    {
        // TODO: Implement HandleMessage() method.
    }

}
