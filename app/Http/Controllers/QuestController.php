<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use App\Models\QuestUser;
use App\Models\ShinobiUser;
use App\Models\UsersItem;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function start($request){
        $user = ShinobiUser::wherePeerId($request["object"]["peer_id"])->first();
        $quest = Quest::whereId($request["object"]["payload"]["QuestName"])->first();
        if ($user->energy < 25){
            return "low energy";
        }
        $active_quest = new QuestUser();
        $active_quest->shinobi_id = $user->id;
        $active_quest->quests_id = $quest->id;
        $active_quest->save();

        return "ok";
    }
}
