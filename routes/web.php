<?php

use App\Http\Controllers\BotHandlerController;
use App\Http\Controllers\ServerAuthController;
use App\Models\Administrator;
use App\Services\MediaService\Photo\VkPhotoService;
use App\Models\Item;
use App\Models\Quest;
use App\Models\QuestUser;
use App\Models\ShinobiUser;
use App\Models\ShopItem;
use App\Models\UsersItem;
use App\Services\BotService\GTranslate\Gtranslate;
use App\Services\BotService\VkEngine\KeyboardGenerate;
use App\Services\BotService\VkEngine\Regex;
use App\Services\BotService\VkEngine\VkMethods;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    $admins = Administrator::where("status", "active")->get();
    $re = '/\/(\w+)$/m';
    $str = 'https://vk.com/kaori_el';

    preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);


    dd($matches);
});

Route::post('/vk_bot_callback', [BotHandlerController::class, 'authVkBot']);
