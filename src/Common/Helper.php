<?php

namespace Sylapi\Courier\Common;

/**
 * Class Helper
 * @package Sylapi\Courier\Common
 */
class Helper
{
    /**
     * @return bool|string
     */
    static function guid() {

        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $retval = substr($charid, 0, 32);
        return $retval;
    }

    /**
     * @param $data
     * @return mixed
     */
    static function toArray($data) {

        $json = json_encode($data);
        return json_decode($json, true);
    }

    /**
     * @param $price
     * @return mixed
     */
    static function toAmonut($price) {

        return str_replace(array(',', ' '), array('.', ''), $price);
    }
}