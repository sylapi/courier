<?php

namespace Sylapi\Courier\Common;

/**
 * Class Helper.
 */
class Helper
{
    /**
     * @return bool|string
     */
    public static function guid()
    {
        mt_srand((float) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $retval = substr($charid, 0, 32);

        return $retval;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public static function toArray($data)
    {
        $json = json_encode($data);

        return json_decode($json, true);
    }

    /**
     * @param $price
     *
     * @return mixed
     */
    public static function toAmonut($price)
    {
        return str_replace([',', ' '], ['.', ''], $price);
    }
}
