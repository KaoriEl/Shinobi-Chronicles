<?php

namespace App\Http\Controllers\Api;

use App\Models\ShopItem;

class ShopItemsController
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        $item_list = ShopItem::whereStatus("active")->get();
        return response()->json($item_list, 200);
    }


    public function show($shop): \Illuminate\Http\JsonResponse
    {
        $items = ShopItem::whereStatus("active")->whereShop($shop)->paginate(5);
        $items_info = array();
        foreach ($items as $item) {
            if ($item["status"] == "active") {
                array_push($items_info, $item->items);
            }
        }
        return response()->json($items_info, 200);
    }

    public function paginate($shop): float
    {
        $count = ShopItem::whereStatus("active")->whereShop($shop)->count();
        if ($count != 0) {
            return round(log($count, 6) + 1, 0);
        } else {
            return 0;
        }
    }

}
