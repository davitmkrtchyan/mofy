<?php
namespace App\Utils;


class Utils
{
    const SPORT_TYPES = ['FOOTBALL','VOLLEYBALL', 'BASKETBALL', 'GOLF'];
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

    public static function isEventHasMandatoryProperties($event)
    {
        return true;
    }
}