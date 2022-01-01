<?php

namespace App\Services\MediaService\Photo;

use App\Models\VkPhoto;
use App\Services\BotService\VkEngine\VkMethods;

class VkPhotoService
{

    /**
     *
     * @param $request    *This is answer vk callback api
     * @param $img_name  *img name in format Name.type
     * @param $class  *Class name where use this img
     * @return array|string[]|void
     */
    public function index($request,$img_name,$class){
        $VkPhotos = VkPhoto::whereClass($class)->get();
        if (isset($request["object"]["message"]["peer_id"])){
            $peer_id = $request["object"]["message"]["peer_id"];
        }else{
            $peer_id = $request["object"]["peer_id"];
        }
        if (count($VkPhotos) < 1){
            $photo = (new VkMethods())->_bot_uploadPhoto($peer_id,public_path()."/image/" . $img_name);

            $attachments = array(
                'photo'.$photo['owner_id'].'_'.$photo['id'],
            );
            $vk_photo = new VkPhoto();
            $vk_photo->photo =  'photo'.$photo['owner_id'].'_'.$photo['id'];
            $vk_photo->class = $class;
            $vk_photo->save();
            return $attachments;
        }else{
            foreach ($VkPhotos as $photo){
                return array($photo["photo"]);
            }
        }

    }

}
