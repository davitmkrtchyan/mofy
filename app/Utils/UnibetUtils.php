<?php
namespace App\Utils;

use App\Utils\Events\BasketballEvent;
use App\Utils\Events\FootballEvent;
use App\Utils\Events\GolfEvent;
use App\Utils\Events\HorseRacingEvent;
use App\Utils\Events\IceHockeyEvent;
use App\Utils\Events\TennisEvent;
use App\Utils\Events\VolleyballEvent;
use Exception;

class UnibetUtils
{
    public static function buildUnibetEventsObjects($model)
    {
        $resultModel = collect();
        $model->keys()->each(function ($events, $sportName) use ($resultModel) {
            $resultModel->put($events, collect());
        });
        $model->each(function ($events, $sportName) use ($resultModel) {
            collect($events)->each(function ($event, $key) use ($sportName, $resultModel) {
                $class = self::resolveSportNameClass($sportName);
                $sportObject = new $class();
                foreach (get_object_vars($sportObject) as $propertyName => $key) {
                    $sportObject->{$propertyName} = $event->event->{$propertyName};
                }
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
}