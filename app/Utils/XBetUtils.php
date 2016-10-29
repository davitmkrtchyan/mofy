<?php

namespace App\Utils;


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
}