<?php
namespace App\Utils;


class Utils
{
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

    public static function convertAmericanOddToDecimal($value)
    {
        $result = $value[0] === '-' ? (100 / floatval(substr($value, 1)) + 1) : (floatval($value) / 100 + 1);
        return round($result, 2);
    }

    public static function getFractionalOddValue($value)
    {
        return $value ? floatval($value) : '';
    }

    public static function sortEventsByDate($eventsList)
    {
        for ($i = 0; $i < $eventsList->count() - 1; $i++) {
            for ($j = 1; $j < $eventsList->count() - $i; $j++) {
                if ($eventsList[$j - 1]->start < $eventsList[$j]->start) {
                    $tmp = $eventsList[$j - 1];
                    $eventsList[$j - 1] = $eventsList[$j];
                    $eventsList[$j] = $tmp;
                }
            }
        }
        return $eventsList->slice(0, UnibetUtils::$GAMES_COUNT_PER_TAB);
    }

    public static function isNamesLike($name1, $name2)
    {
        $name1Array = collect(explode(" ", $name1));
        $name2Array = collect(explode(" ", $name2));
        $intersections = $name1Array->intersect($name2Array);
        return $intersections->count() > 0;
    }

    public static function sliceEventsModel($eventsList)
    {
        $result = collect(['eventsGroups' => collect([])]);
        collect($eventsList['eventsGroups'])->each(function ($events, $sportName) use ($eventsList, $result) {
            $result['eventsGroups']->put($sportName, $events->slice(0, UnibetUtils::$GAMES_COUNT_PER_TAB));
        });
        return $result;
    }
}