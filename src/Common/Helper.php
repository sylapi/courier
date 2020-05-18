<?php

namespace Sylapi\Courier\Common;

class Helper
{
    public static function guid()
    {
        mt_srand((float) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $retval = substr($charid, 0, 32);

        return $retval;
    }

    public static function toArray($data)
    {
        $json = json_encode($data);

        return json_decode($json, true);
    }

    public static function toAmonut($price)
    {
        return str_replace([',', ' '], ['.', ''], $price);
    }
}
