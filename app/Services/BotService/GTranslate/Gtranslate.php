<?php

namespace App\Services\BotService\GTranslate;

class Gtranslate
{
    public function gtranslate($str, $lang_from, $lang_to) {
        $query_data = array(
            'client' => 'x',
            'q' => $str,
            'sl' => $lang_from,
            'tl' => $lang_to
        );
        $filename = 'http://translate.google.ru/translate_a/t';
        $options = array(
            'http' => array(
                'user_agent' => 'Mozilla/5.0 (Windows NT 6.0; rv:26.0) Gecko/20100101 Firefox/26.0',
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($query_data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($filename, false, $context);
        return json_decode($response);
    }

}
