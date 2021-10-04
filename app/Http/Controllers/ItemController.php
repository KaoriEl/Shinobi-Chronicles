<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShinobiUser;
use App\Models\UsersItem;
use App\Models\VkPhoto;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     *
     * @param $request *This is answer vk callback api
     * @return array|string[]|void
     */
    public function index($request, $id)
    {
        $ItemImage = Item::whereId($id)->get();

        if (count($ItemImage) < 1) {
            $photo["image"] = "photo94964193_457267874";
            foreach ($ItemImage as $photo) {
                return array($photo["image"]);
            }
        } else {
            foreach ($ItemImage as $photo) {
                return array($photo["image"]);
            }
        }

    }

    public function equip($request)
    {

        $user = ShinobiUser::wherePeerId($request["object"]["peer_id"])->first();
        $items = UsersItem::whereShinobiId($user["id"])->whereStatus("active")->count();
        if ($items < 1) {
            $item = UsersItem::whereId($request["object"]["payload"]["EquipItemId"])->first();
            $item->update(['status' => "active"]);
            $item_info = $item->items;

            $ninjutsu = $user["ninjutsu"] + $item_info["ninjutsu"];
            $taijutsu = $user["taijutsu"] + $item_info["taijutsu"];
            $genjutsu = $user["genjutsu"] + $item_info["genjutsu"];
            $user->update(["ninjutsu" => $ninjutsu, "taijutsu" => $taijutsu, "genjutsu" => $genjutsu]);

            $answer = "ok";
        } else {
            $answer = "not ok";
        }
        return $answer;

    }

    public function unequip($request)
    {

        $user = ShinobiUser::wherePeerId($request["object"]["peer_id"])->first();

        $item = UsersItem::whereId($request["object"]["payload"]["UnEquipItemId"])->first();
        $item->update(['status' => "inactive"]);
        $item_info = $item->items;

        $ninjutsu = $user["ninjutsu"] - $item_info["ninjutsu"];
        $taijutsu = $user["taijutsu"] - $item_info["taijutsu"];
        $genjutsu = $user["genjutsu"] - $item_info["genjutsu"];
        $user->update(["ninjutsu" => $ninjutsu, "taijutsu" => $taijutsu, "genjutsu" => $genjutsu]);

        $answer = "ok";
        return $answer;

    }
}
