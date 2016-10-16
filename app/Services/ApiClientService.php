<?php

namespace App\Services;

use App\Utils\UnibetUtils;
use App\Utils\Utils;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiClientService
{
    const UNIBET_LIVE_EVENTS = "http://api.unicdn.net/v1/feeds/sportsbook/event/live.json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842";

    public function getLiveEvents()
    {
        $client = new Client();
        $res = $client->get(self::UNIBET_LIVE_EVENTS);
        $events = Utils::decodeResponse($res->getBody());
        return $this->buildEventsModel(collect($events->liveEvents)->groupBy('event.sport'));
    }


    private function buildEventsModel($events)
    {

        $model = collect([]);
        $missedEventsNames = collect([]);
        foreach (Utils::getMainSportTypes() as $typeName) {
            $event = $events->get($typeName);
            if ($event != null) {
                $model->put($typeName, $event);
            } else {
                $missedEventsNames->push($typeName);
            }
        }

        $secondaryList = Utils::getSecondarySportTypes();
        $missedEventsNamesSize = sizeof($missedEventsNames);
        $this->fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model);

        return ['eventsGroups' => UnibetUtils::buildUnibetEventsObjects($model)];
    }

    private function fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model)
    {
        if ($missedEventsNamesSize > 0) {
            $typeName = $secondaryList[$missedEventsNamesSize - 1];
            $event = $events->get($typeName);
            if ($event != null) {
                $model->put($typeName, $event);
                $secondaryList = array_diff($secondaryList, [$typeName]);
                $missedEventsNamesSize -= 1;
            }
            $this->fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model);
        }
    }
}