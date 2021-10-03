<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\VkPhoto;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     *
     * @param $request    *This is answer vk callback api
     * @return array|string[]|void
     */
    public function index($request,$id){
        $ItemImage = Item::whereId($id)->get();

        if (count($ItemImage) < 1){
            $photo["image"] = "photo94964193_457267874";
            foreach ($ItemImage as $photo){
                return array($photo["image"]);
            }
        }else{
            foreach ($ItemImage as $photo){
                return array($photo["image"]);
            }
        }

    }
}
