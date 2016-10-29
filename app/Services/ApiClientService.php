<?php

namespace App\Services;

use App\Utils\UnibetUtils;
use App\Utils\Utils;
use App\Utils\XBetUtils;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiClientService
{
    const UNIBET_LIVE_EVENTS = "http://api.unicdn.net/v1/feeds/sportsbook/event/live.json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842";
    const XBET_LIVE_EVENTS = "https://betpartpart.com/PartLive/GetAllFeedGames?lng=en";

    public function getLiveEvents()
    {
        $unibetEvents = ['eventsGroups' => collect([])];
        try {
            $unibetEvents = $this->getUnibetEvents();
            $xbetEvents = $this->getXbetEvents();
            return $this->sortByDateAndOdds($unibetEvents, $xbetEvents);
        } catch (\Exception $e) {
            return Utils::sliceEventsModel($unibetEvents);
        }
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

        $unibetEvent = UnibetUtils::createInstanceForSport($events->events[0]->sport);
        $unibetEvent->homeName = $events->events[0]->homeName;
        $unibetEvent->awayName = $events->events[0]->awayName;
        $unibetEvent->group = $events->events[0]->group;
        $unibetEvent->sportName = $events->events[0]->path[0]->englishName;
        $unibetEvent->countryName = $events->events[0]->path[1]->englishName;
        $unibetEvent->start = Carbon::parse($events->events[0]->start);

        $matchedObject = $this->getXbetEvents()['eventsGroups']->get($events->events[0]->sport)->first(function ($index, $xbetSportObject) use ($unibetEvent) {
            return $unibetEvent->equals($xbetSportObject);
        });

        return [
            'homeName' => $events->events[0]->homeName,
            'awayName' => $events->events[0]->awayName,
            'group' => $events->events[0]->group,
            'sportName' => $events->events[0]->path[0]->englishName,
            'countryName' => $events->events[0]->path[1]->englishName,
            'start' => $events->events[0]->start,
            'eventDetails' => [
                'Unibet' => ['url' => 'https://www.unibet.com', 'odd1' => $odd1, 'odd2' => $odd3 != null ? $odd2 : '-', 'odd3' => $odd3 == null ? $odd2 : $odd3],
                'Xbet' => ['url' => 'https://www.1xbet.com/', 'odd1' => $matchedObject->oddsFirst, 'odd2' => $matchedObject->oddsCross, 'odd3' => $matchedObject->oddsSecond],
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
        $client = new Client();
        $res = $client->get(self::XBET_LIVE_EVENTS);
        $xbetEvents = Utils::decodeResponse($res->getBody());
        $events = $this->convertXbetToUnibet(collect($xbetEvents));
        return $events;
    }

    private function buildEventsModel($events, $useAmericanOdds = true)
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
        return ['eventsGroups' => UnibetUtils::buildUnibetEventsObjects($model, $useAmericanOdds)];
    }

    private function fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model)
    {
        if ($missedEventsNamesSize > 0) {
            $typeName = collect($secondaryList)->get($missedEventsNamesSize - 1);
            $event = $events->get($typeName);
            if ($event != null) {
                $model->put($typeName, $event);
            }
            $secondaryList = array_diff($secondaryList, [$typeName]);
            $missedEventsNamesSize -= 1;
            $this->fillEventsFromSecondaryList($secondaryList, $missedEventsNamesSize, $events, $model);
        }
    }

    private function sortByDateAndOdds($unibetEvents, $xbetEvents)
    {
        $result = collect(['eventsGroups' => collect([])]);

        $unibetEvents['eventsGroups']->each(function ($unibetEventsForSport, $sportName) use ($xbetEvents, $result) {
            $resultListForSport = collect([]);
            $unibetFilteredByDateListForCurrentSport = Utils::sortEventsByDate($unibetEventsForSport);
            $xbetFilteredByUnibetGames = collect([]);

            $unibetFilteredByDateListForCurrentSport->each(function ($unibetEventObject) use ($xbetEvents, $sportName, $xbetFilteredByUnibetGames) {
                if ($xbetEvents['eventsGroups']->get($sportName) != null) {
                    $matchingGame = $xbetEvents['eventsGroups']->get($sportName)->first(function ($index, $xbetEventObject) use ($unibetEventObject) {
                        return $unibetEventObject->equals($xbetEventObject);
                    });
                    if ($matchingGame != null) {
                        $matchingGame->id = $unibetEventObject->id;
                        $xbetFilteredByUnibetGames->push($matchingGame);
                    }
                }
            });

            $unibetFilteredByDateListForCurrentSport->each(function ($unibetEventObject) use ($xbetFilteredByUnibetGames, $resultListForSport) {
                $xbetObject = $xbetFilteredByUnibetGames->first(function ($index, $eventObject) use ($unibetEventObject) {
                    return $unibetEventObject->equals($eventObject);
                });
                if ($xbetObject == null) {
                    $resultListForSport->push($unibetEventObject);
                } else {
                    $unibetEventObject->oddsFirst > $xbetObject->oddsFirst ? $resultListForSport->push($unibetEventObject) : $resultListForSport->push($xbetObject);
                }
            });

            $result['eventsGroups']->put($sportName, $resultListForSport);
        });
        return $result;
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

    private function convertXbetToUnibet($xbetEvents)
    {
        $post_data = collect([]);
        $xbetEvents->each(function ($xbetEvent, $key) use ($post_data) {
            if ($xbetEvent->P == "0" && XBetUtils::sportIsSupported($xbetEvent->S)) {
                $country = '';
                $league = '';
                if (strpos($xbetEvent->C, '.') !== false) {
                    $countryAndLeague = explode(".", $xbetEvent->C);
                    $country = $countryAndLeague[0];
                    $league = sizeof($countryAndLeague) > 1 ? $countryAndLeague[1] : $xbetEvent->C;
                }
                $eventJson = array(
                    'event' => array(
                        'id' => $xbetEvent->I,
                        'name' => $xbetEvent->H . " " . $xbetEvent->A,
                        'homeName' => $xbetEvent->H,
                        'awayName' => $xbetEvent->A,
                        'start' => '2016-10-29T09:24:50Z',//TODO
                        'group' => $league,
                        'sport' => XBetUtils::$SPORT_MAPPING_TO_UNIBET[$xbetEvent->S],
                        'path' => array(
                            array(),
                            array('englishName' => $country ?: $xbetEvent->C),
                            array()
                        )
                    ),
                    'mainBetOffer' => array(
                        'outcomes' => array(
                            array('type' => 'OT_ONE', 'oddsFractional' => @$xbetEvent->EE[0]->C, 'oddsAmerican' => ''),
                            array('type' => 'OT_TWO', 'oddsFractional' => @$xbetEvent->EE[1]->C, 'oddsAmerican' => ''),
                            array('type' => 'OT_CROSS', 'oddsFractional' => @$xbetEvent->EE[2]->C, 'oddsAmerican' => '')
                        )
                    )
                );
                $post_data->push($eventJson);
            }
        });
        return $this->buildEventsModel(collect(Utils::decodeResponse($post_data))->groupBy('event.sport'), false);
    }
}