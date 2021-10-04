<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShinobiUser;
use App\Models\UsersItem;
use App\Services\BotService\VkEngine\Regex;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $request){
        $vk_user_info = (new VkMethods())->get_user($request["object"]["message"]["from_id"]);
        $first_name = $vk_user_info[0]["first_name"];
        if (isset($vk_user_info[0]["last_name"])){
            $last_name = $vk_user_info[0]["last_name"];
        }else{
            $last_name ="";
        }
        $peer_id = $request["object"]["message"]["peer_id"];
        $random_clan = DB::table("clans")->inRandomOrder()->first();
        $random_village = DB::table("villages")->inRandomOrder()->first();
        $ninjutsu = random_int(1, 20);
        $taijutsu = random_int(1, 20);
        $genjutsu = random_int(1, 20);
        $check_uniq = DB::table("shinobi_users")->where("peer_id", $peer_id)->count();
        if ($check_uniq <= 0) {
            $shinobi = new ShinobiUser();
            $shinobi->name = $first_name . " " . $last_name;
            $shinobi->step = "new_user";
            $shinobi->clan_id = $random_clan->id;
            $shinobi->village_id = $random_village->id;
            $shinobi->ninjutsu = $ninjutsu;
            $shinobi->taijutsu = $taijutsu;
            $shinobi->genjutsu = $genjutsu;
            $shinobi->battle_power = ($genjutsu+$taijutsu+$ninjutsu) * 100;
            $shinobi->role = "player";
            $shinobi->peer_id = $peer_id;
            $shinobi->save();
            return "Successful addition";
        } else {
            return "Bad addition";
        }
    }

    public function GetUser(Request $request){
        return DB::table("shinobi_users")->where("peer_id", $request["object"]["message"]["peer_id"])->first();
    }

    public function BuyItem(Request $request): string
    {
        $pair = (new Regex())->regex("*", $request["object"]["payload"]["BuyItemId"]);
        $user = new ShinobiUser();
        $user_info = $user->wherePeerId($request["object"]["peer_id"])->first();

        if ($user_info["money"] >=$pair[1]){
            $user_info["money"] = $user_info["money"] - $pair[1];
            $user->money = $user_info["money"];
            $user_info->update(['money' => $user_info["money"]]);

            $users_items = new UsersItem();
            $users_items->item_id = $pair[0];
            $users_items->shinobi_id = $user_info["id"];
            $users_items->save();

            return "buy complete";
        }else{
            return "no money";
        }



    }

    public function CheckUser(Request $request): string
    {
        $peer_id = $request["object"]["message"]["peer_id"];
        $check_uniq = DB::table("shinobi_users")->where("peer_id", $peer_id)->count();
        if ($check_uniq <= 0) {
            return "Successful addition";
        } else {
            return "Bad addition";
        }
    }
}
