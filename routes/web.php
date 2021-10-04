<?php

use App\Http\Controllers\BotHandlerController;
use App\Http\Controllers\ServerAuthController;
use App\Http\Controllers\VKPhotoController;
use App\Models\Item;
use App\Models\ShinobiUser;
use App\Models\ShopItem;
use App\Models\UsersItem;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\Regex;
use App\Services\BotService\VkEngine\VkMethods;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $item = UsersItem::whereId(17)->first();
    $item->update(['status' => "active"]);



//
//$tests = UsersItem::whereShinobiId(8)->get();
//foreach ($tests as $test){
//    dump($test->items["item_name"]);
//}
//dd("ok");

//    $photo = (new VkMethods())->_bot_uploadPhoto(474287972,resource_path()."\image\ChackraSheme.png");
//    $attachments = array(
//        'photo'.$photo['owner_id'].'_'.$photo['id'],
//    );
//    dd($attachments);

//    $keyboard = [
//        "one_time" => false,
//        "inline" => true,
//        "buttons" => [[
//        ]]
//    ];
//
//    $count = ShopItem::whereShop("TentenShop")->count();
//    $result=round( log($count,6)+1, 0 );
//    $data = array();
//    for ($i = 1; $i <= $result; $i++) {
//        array_push($data,'callback,{"TentenPage": "' . $i . ',TentenShop"},стр'. $i .'');
//    }
//    $keyboard = (new KeyboardGenerate($keyboard))->generate($data, "base", false, true, 3);
//    $encodedKeyboard = json_encode($keyboard);
//    dd($keyboard);

//    $data = array('text,{"button": "1"},Начать','text,{"button": "1"},123');
//    $keyboard = [
//        "one_time" => false,
//        "inline" => true,
//        "buttons" => [[
//            ["action" => [
//                "type" => "callback",
//                "payload" => '{"button": "1"}',
//                "label" => "test"],
//            ],
//        ]]
//    ];;
//    $count = 0;
//    foreach ($data as $pair){
//        $torn_pair = explode(',', $pair);;
//        $keyboard["buttons"][$count][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label'=> $torn_pair[2]];
//        Log::channel('debug-channel')->debug("--------vk_config curl_error-------\n" . json_encode($keyboard) . "\n\n\n");
////      $count++;
//        dump($keyboard);
//    }
//    dd("end");

});

Route::post('/vk_bot_callback', [BotHandlerController::class, 'authVkBot']);
