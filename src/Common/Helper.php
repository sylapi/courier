<?php

namespace Sylapi\Courier\Common;

class Helper
{
    static function guid() {

        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $retval = substr($charid, 0, 32);
        return $retval;
    }

    static function toArray($data) {

        $json = json_encode($data);
        return json_decode($json, true);
    }

    static function toAmonut($price) {

        return str_replace(array(',', ' '), array('.', ''), $price);
    }
}