<?php
namespace App\Utils;

use App\Utils\Events\BasketballEvent;
use App\Utils\Events\FootballEvent;
use App\Utils\Events\GolfEvent;
use App\Utils\Events\HorseRacingEvent;
use App\Utils\Events\IceHockeyEvent;
use App\Utils\Events\TennisEvent;
use App\Utils\Events\VolleyballEvent;
use Carbon\Carbon;
use Exception;

class UnibetUtils
{
    private static $EVENT_MAIN_PROPERTIES = ['id', 'name', 'group', 'start', 'homeName', 'awayName'];
    private static $EVENT_ODDS_TYPES_MAPPING = ['OT_ONE' => 'oddsFirst', 'OT_CROSS' => 'oddsCross', 'OT_TWO' => 'oddsSecond'];
    public static $GAMES_COUNT_PER_TAB = 5;

    public static function buildUnibetEventsObjects($model, $useAmericanOdds = true)
    {
        $resultModel = collect();
        $model->keys()->each(function ($events, $sportName) use ($resultModel, $useAmericanOdds) {
            $resultModel->put($events, collect());
        });
        $model->each(function ($events, $sportName) use ($resultModel, $useAmericanOdds) {
            collect($events)->each(function ($event, $key) use ($sportName, $resultModel, $useAmericanOdds) {
                $class = self::resolveSportNameClass($sportName);
                $sportObject = new $class();
                foreach (self::$EVENT_MAIN_PROPERTIES as $propertyName) {
                    $val = array_key_exists($propertyName, $event->event) ? $event->event->{$propertyName} : '';
                    if ($propertyName == 'start') {
                        $sportObject->{$propertyName} = Carbon::parse($val);
                    } else {
                        $sportObject->{$propertyName} = $val;
                    }
                }
                if (array_key_exists('mainBetOffer', $event) && array_key_exists('outcomes', $event->mainBetOffer)) {
                    $asCollection = collect($event->mainBetOffer->outcomes);
                    foreach (self::$EVENT_ODDS_TYPES_MAPPING as $oddType => $objectProperty) {
                        $odd = $asCollection->first(function ($value, $key) use ($oddType) {
                            return $key->type == $oddType;
                        });
                        if ($odd != null) {
                            $oddVale = $useAmericanOdds ? Utils::convertAmericanOddToDecimal($odd->oddsAmerican) : Utils::getFractionalOddValue($odd->oddsFractional);
                            $sportObject->{$objectProperty} = $oddVale;
                        }
                    }
                }
                $sportObject->url = (array_key_exists('url', $event->event) && $event->event->url != null ? $event->event->url : self::buildGameURLByID($event->event->id));
                $sportObject->countryName = $event->event->path[1]->englishName;
                $resultModel->get($sportName)->push($sportObject);
            });

        });
        return $resultModel;
    }

    public static function resolveSportNameClass($sportName)
    {
        switch ($sportName) {
            case "FOOTBALL":
                return FootballEvent::class;
            case "TENNIS":
                return TennisEvent::class;
            case "ICE_HOCKEY":
                return IceHockeyEvent::class;
            case "BASKETBALL":
                return BasketballEvent::class;
            case "HORSE_RACING":
                return HorseRacingEvent::class;
            case "VOLLEYBALL":
                return VolleyballEvent::class;
            case "GOLF":
                return GolfEvent::class;
            default:
                throw new Exception("Sport type '" . $sportName . "' is not supported");
        }
    }

    public static function createInstanceForSport($sportName)
    {
        $class = self::resolveSportNameClass($sportName);
        return new $class();
    }

    public static function getSecondarySportTypes()
    {
        return ['VOLLEYBALL', 'GOLF'];
    }

    public static function getMainSportTypes()
    {
        return ['FOOTBALL', 'TENNIS', 'ICE_HOCKEY', 'BASKETBALL', 'HORSE_RACING'];
    }

    public static function buildEventDetailsURL($id)
    {
        return "http://api.unicdn.net/v1/feeds/sportsbook/betoffer/live/event/" . $id . ".json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842&outComeSortBy=lexical&outComeSortDir=asc";
    }

    public static function buildGameURLByID($eventId)
    {
        return "https://www.unibet.com/betting#event/live/" . $eventId;
    }
}