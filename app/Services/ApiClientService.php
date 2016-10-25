<?php

namespace App\Services;

use App\Utils\UnibetUtils;
use App\Utils\Utils;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiClientService
{
    const UNIBET_LIVE_EVENTS = "http://api.unicdn.net/v1/feeds/sportsbook/event/live.json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842";
    const XBET_LIVE_EVENTS = "https://part.upnp.xyz/PartLine/GetAllFeedGames";

    public function getLiveEvents()
    {
        $unibetEvents = $this->getUnibetEvents();
        $xsbetEvents = $this->getXbetEvents();
        return $unibetEvents;
    }

    public function getEventByID($id)
    {
        $client = new Client();
        $res = $client->get(UnibetUtils::buildEventDetailsURL($id));
        $events = Utils::decodeResponse($res->getBody());
        $oddsSize = sizeof($events->betoffers[0]->outcomes);
        $odd1 = Utils::convertAmericanOddToDecimal($events->betoffers[0]->outcomes[0]->oddsAmerican);
        $odd2 = Utils::convertAmericanOddToDecimal($events->betoffers[0]->outcomes[1]->oddsAmerican);
        $odd3 = null;
        if ($oddsSize == 3) {
            $odd3 = Utils::convertAmericanOddToDecimal($events->betoffers[0]->outcomes[2]->oddsAmerican);
        }
        return [
            'homeName' => $events->events[0]->homeName,
            'awayName' => $events->events[0]->awayName,
            'group' => $events->events[0]->group,
            'sportName' => $events->events[0]->path[0]->englishName,
            'countryName' => $events->events[0]->path[1]->englishName,
            'start' => $events->events[0]->start,
            'eventDetails' => [
                'Unibet' => ['url' => 'https://www.unibet.com', 'odd1' => $odd1, 'odd2' => $odd3 != null ? $odd2 : '-', 'odd3' => $odd3 == null ? $odd2 : $odd3],
                'Xbet' => ['url' => 'https://www.1xbet.com/', 'odd1' => '', 'odd2' => '', 'odd3' => ''],
            ]
        ];
    }


    //----------------------------------------------------//

    public function getUnibetEvents()
    {
        $client = new Client();
        $res = $client->get(self::UNIBET_LIVE_EVENTS);
        $events = Utils::decodeResponse($res->getBody());
        return $this->buildEventsModel(collect($events->liveEvents)->groupBy('event.sport'));
    }

    public function getXbetEvents()
    {
    }

    private function buildEventsModel($events)
    {

        $model = collect([]);
        $missedEventsNames = collect([]);
        foreach (UnibetUtils::getMainSportTypes() as $typeName) {
            $event = $events->get($typeName);
            if ($event != null) {
                $model->put($typeName, $event);
            } else {
                $missedEventsNames->push($typeName);
            }
        }

        $secondaryList = UnibetUtils::getSecondarySportTypes();
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
            }
            $secondaryList = array_diff($secondaryList, [$typeName]);
            $missedEventsNamesSize -= 1;
            $this->fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model);
        }
    }

    //////////////----------------------------////////////////////////
    public function loadGamesByGroupAndCountry($sport, $country, $group)
    {
        $unibetEvents = collect($this->getUnibetEvents());
        $currentSportEvents = $unibetEvents->get('eventsGroups')->get($sport);
        $filteredGames = $currentSportEvents->filter(function ($item) use ($country, $group) {
            return $item->countryName == $country && $item->group == $group;
        });
        return ['games' => $filteredGames];
    }
}