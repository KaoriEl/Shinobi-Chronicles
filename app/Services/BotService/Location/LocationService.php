<?php

namespace App\Services\BotService\Location;

use App\Models\ShinobiUser;
use App\Services\BotService\DefaultMessage;
use App\Services\BotService\Location\Iron_Country\Iron_Country;
use App\Services\BotService\Location\Land_of_Lightning\Land_of_Lightning;
use App\Services\BotService\Location\Land_of_Sound\Land_of_Sound;
use App\Services\BotService\Location\Land_of_the_Earth\Land_of_the_Earth;
use App\Services\BotService\Location\Land_of_the_Wind\Land_of_the_Wind;
use App\Services\BotService\Location\Land_of_Water\Land_of_Water;

class LocationService
{
    public function index($request){
        $user = ShinobiUser::wherePeerId($request["object"]["message"]["peer_id"])->first();
        if ($user->active_quests()->count() > 0){
            return "Quest active";
        }else{
            return "Go location";
        }
    }

    public function LocationChoose($request){
        switch ($request["object"]["payload"]["Location"]){
            case "Country of wind":
                return(new Land_of_the_Wind())->HandleMessage($request);
            case "Land of Water":
                return(new Land_of_Water())->HandleMessage($request);
            case "Iron Country":
                return(new Iron_Country())->HandleMessage($request);
            case "Land of Sound":
                return (new Land_of_Sound())->HandleMessage($request);
            case "Land of the Earth":
                return (new Land_of_the_Earth())->HandleMessage($request);
            case "Land of Lightning":
                return (new Land_of_Lightning())->HandleMessage($request);
            default:
                break;
        }
    }

}
