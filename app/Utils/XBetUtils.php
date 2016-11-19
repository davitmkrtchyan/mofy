<?php

namespace App\Utils;

use DateTime;

class XBetUtils
{
    private static $EVENT_MAIN_PROPERTIES = ['C', 'D', 'A', 'H'];
    private static $EVENT_ODDS_TYPES_MAPPING = ['C' => 'oddsFirst'];

    public static $SPORT_MAPPING_TO_UNIBET = [
        "Football" => "FOOTBALL",
        "Tennis" => "TENNIS",
        "Ice Hockey" => "ICE_HOCKEY",
        "Basketball" => "BASKETBALL",
        "Horse Racing" => "HORSE_RACING",
        "Volleyball" => "VOLLEYBALL",
        "Golf" => "GOLF",
    ];

    public static function sportIsSupported($xbetSport)
    {
        return array_key_exists($xbetSport, self::$SPORT_MAPPING_TO_UNIBET);
    }

    public static function buildDate($xbetDate)
    {
        $timStamp = substr(self::getStringBetween($xbetDate, '(', ')'), 0, -3);
        $d = new DateTime();
        $d->setTimestamp($timStamp);
        return $d->format('Y-m-d H:i:s');
    }

    public static function getStringBetween($str, $from, $to)
    {
        $sub = substr($str, strpos($str, $from) + strlen($from), strlen($str));
        return substr($sub, 0, strpos($sub, $to));
    }
}