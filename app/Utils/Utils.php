<?php
namespace App\Utils;


use App\Utils\Events\SureBet;
use Illuminate\Support\Facades\Request;

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
        if ($value == null) {
            return '-';
        }
        $result = $value[0] === '-' ? (100 / floatval(substr($value, 1)) + 1) : (floatval($value) / 100 + 1);
        return round($result, 2);
    }

    public static function getFractionalOddValue($value)
    {
        return $value ? floatval($value) : '';
    }

    public static function sortEventsByDate($eventsList, $applyRestriction = true)
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
        return $applyRestriction ? $eventsList->slice(0, UnibetUtils::$GAMES_COUNT_PER_TAB) : $eventsList;
    }

    public static function isNamesLike($name1, $name2)
    {
        $name1Array = collect(explode(" ", $name1));
        $name2Array = collect(explode(" ", $name2));
        $intersections = $name1Array->intersect($name2Array);

        if ($intersections->count() > 0) {
            return true;
        } else {
            return self::isInteractionExists($name1Array, $name2Array) || self:: isInteractionExists($name2Array, $name1Array);
        }
    }

    public static function sliceEventsModel($eventsList)
    {
        $result = collect(['eventsGroups' => collect([])]);
        collect($eventsList['eventsGroups'])->each(function ($events, $sportName) use ($eventsList, $result) {
            $result['eventsGroups']->put($sportName, $events->slice(0, UnibetUtils::$GAMES_COUNT_PER_TAB));
        });
        return $result;
    }

    private static function isInteractionExists($name1Array, $name2Array)
    {
        $isLike = false;
        foreach ($name1Array as $partOfName) {
            foreach ($name2Array as $partOfNameSecond) {
                $escaped1 = str_replace(')', '', str_replace('(', '', $partOfName));
                $escaped2 = str_replace(')', '', str_replace('(', '', $partOfNameSecond));
                if (preg_match('/' . str_replace('/', '\/', $escaped1) . '/', $escaped2) == true) {
                    $isLike = true;
                }
            }
        }
        return $isLike;
    }

    public static function getAmericanOddByType($outcomes, $oddType)
    {
        $matchedOutcome = collect($outcomes)->first(function ($index, $outcomeObject) use ($oddType) {
            return $outcomeObject->type == $oddType;
        });
        return $matchedOutcome ? $matchedOutcome->oddsAmerican : null;
    }

    public static function highlight($text, $words)
    {
        $text = preg_replace("|($words)|ui", "<span class=\"hit\">$1</span>", $text);
        return $text;
    }

    public static function convertOdd($oddInDecimal, $oddType = null)
    {
        $oddType = $oddType ?: Request::get('oddType');
        switch ($oddType) {
            case "US":
                return self::decimalToAmericanOdd($oddInDecimal);
            case "UK":
                return self::decimalToFractionalOdd($oddInDecimal);
            default:
                return $oddInDecimal;
        }
    }

    public static function decimalToAmericanOdd($value)
    {
        if ($value == null || $value == '-') {
            return '-';
        }
        $number = floatval($value);
        if ($number >= 2) {
            return ($value - 1) * 100;
        } else {
            return -100 * (1 - $value);
        }
    }

    public static function decimalToFractionalOdd($value)
    {
        return self::decimalToFraction(floatval($value) - 1);
    }

    public static function fractionToDecimal($fraction)
    {
        $parts = explode('/', $fraction);
        return round(intval($parts[0]) / intval($parts[1]), 2);
    }

    public static function decimalToFraction($value)
    {
        $pnum = round($value, 2);
        $denominator = pow(10, 2);
        $numerator = $pnum * $denominator;
        return $numerator . "/" . $denominator;
    }

    public static function calculateProfit(SureBet $sureBet)
    {
        $result = 1;
        if ($sureBet->oddsFirst) {
            $result = 1 / $sureBet->oddsFirst;
            if ($sureBet->oddsSecond) {
                $result = $result + (1 / $sureBet->oddsSecond);
            }
            if ($sureBet->oddsCross && $sureBet->oddsCross != '-') {
                $result = $result + (1 / $sureBet->oddsCross);
            }
        }
        return $result != 1 ? $result : 1;
    }
}