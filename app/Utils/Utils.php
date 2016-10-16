<?php
namespace App\Utils;


class Utils
{
    const MAIN_SPORT_TYPES = ['FOOTBALL', 'TENNIS', 'ICE_HOCKEY', 'BASKETBALL', 'HORSE_RACING'];
    const SECONDARY_SPORT_TYPES = ['VOLLEYBALL', 'GOLF'];
    const EVENT_MANDATORY_PROPERTIES = ['start', 'homeName', 'awayName'];
    const JSON_TYPE = 'json';
    const XML_TYPE = 'xml';

    public static function decodeResponse($data)
    {
        $type = self::getGlobalResponseType();
        if ($type == self::JSON_TYPE) {
            return json_decode($data);
        } else {
            return json_decode($data);
        }
    }

    public static function getGlobalResponseType()
    {
        return self::JSON_TYPE;
    }
}