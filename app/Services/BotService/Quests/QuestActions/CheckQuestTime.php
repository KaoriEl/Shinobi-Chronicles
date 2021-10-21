<?php

namespace App\Services\BotService\Quests\QuestActions;

use App\Models\QuestUser;
use App\Models\ShinobiUser;
use App\Services\BotService\VkEngine\VkMethods;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CheckQuestTime
{
    public function timer(): string
    {
        dump("1. Get Quests");
        $quests = QuestUser::where('created_at', '<', Carbon::now()->subMinutes(5))->get();
        foreach ($quests as $quest){
            dump("2. Get Pivot info");
            $user_quest = $quest->users()->first();
            $quest_info = $quest->quests()->first();
            dump("3. Generate Message");
            $text = "Задание '" . $quest_info->quests_name . "' успешно выполнено" ;
            $msg = ["text" => $text,
                "keyboard_status" => false,
            ];
            dump("4. Send Message");
            (new VkMethods())->vk_send_message($user_quest->peer_id, $msg);
            try {
                dump("5. Calculate Stats");
                $ninjutsu = $user_quest->ninjutsu + $quest_info->ninjutsu;
                $taijutsu = $user_quest->taijutsu + $quest_info->taijutsu;
                $genjutsu = $user_quest->genjutsu + $quest_info->genjutsu;
                $money = $user_quest->money + $quest_info->reward_money;
                $energy = $user_quest->energy - 25;
                dump("6. Update Stats");
                $user_quest->update(["ninjutsu" => $ninjutsu, "taijutsu" => $taijutsu, "genjutsu" => $genjutsu, "money"=> $money, "energy" => $energy]);
                dump("7. Delete Quest");
                QuestUser::findOrFail($quest->id)->delete();
                dump("8. End");
            }catch (ModelNotFoundException $ex){
                dump("Error");
                Log::channel('error-channel')->debug("--------QuestUser::findOrFail-------\n" . $ex . "\n\n\n");
            }
        }
        return "ok";
    }

}
