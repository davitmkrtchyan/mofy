<?php

namespace App\Services;

use App\Utils\BetAtHomeUtils;
use App\Utils\Group\SportGroup;
use App\Utils\UnibetUtils;
use App\Utils\Utils;
use App\Utils\XBetUtils;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;

class ApiClientService
{
    const UNIBET_LIVE_EVENTS = "http://api.unicdn.net/v1/feeds/sportsbook/event/live.json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842";
    const XBET_LIVE_EVENTS = "https://betpartpart.com/PartLive/GetAllFeedGames?lng=en";
    const UNIBET_ALL_GROUPS = "http://api.unicdn.net/v1/feeds/sportsbook/groups.json?app_id=71d8f332&app_key=d27be2607640ede866d069010a428842";
    const BET_AT_HOME__LIVE_EVENTS = "https://www.bet-at-home.com/en/feed/feed?username=Moreoddsforyou&password=Moreoddsforyou58838!&jurisdictionid=1&type=7";

    static $glob = null;

    public function getAllGroups()
    {
        $client = new Client();
        $res = $client->get(self::UNIBET_ALL_GROUPS);
        $events = Utils::decodeResponse($res->getBody());
        $result = $this->buildAllGroupsModel(collect($events->group->groups));
        return $result['sportTypes'];
    }

    public function buildAllGroupsModel($groups)
    {
        $result = ['sportTypes' => collect([
            'FOOTBALL' => collect([
                'logo' => 's50',
                'name' => '',
                'countryList' => collect([])
            ]),
            'TENNIS' => collect([
                'logo' => 's52',
                'name' => '',
                'countryList' => collect([])
            ]),
            'BASKETBALL' => collect([
                'logo' => 's53',
                'name' => '',
                'countryList' => collect([])
            ]),
            'ICE_HOCKEY' => collect([
                'logo' => 's51',
                'name' => '',
                'countryList' => collect([])
            ]),
            'HORSE_RACING' => collect([
                'logo' => 's50',
                'name' => 'Horse Racing',
                'countryList' => collect([])
            ]),
            'GOLF' => collect([
                'logo' => 's50',
                'name' => 'Go',
                'countryList' => collect([])
            ]),
            'VOLLEYBALL' => collect([
                'logo' => 's54',
                'name' => '',
                'countryList' => collect([])
            ]),
        ])];
        $groups->each(function ($groupBySportType, $index) use ($result) {
            if (in_array($groupBySportType->sport, UnibetUtils::$SPORT_TYPES)) {
                $result['sportTypes']->get($groupBySportType->sport)->put('name', $groupBySportType->name);
                if (array_key_exists('groups', $groupBySportType)) {
                    collect($groupBySportType->groups)->each(function ($groupForCountry, $index1) use ($result, $groupBySportType) {
                        $result['sportTypes']->get($groupBySportType->sport)->get('countryList')->put($groupForCountry->name, collect([]));
                        if (array_key_exists('groups', $groupForCountry)) {
                            collect($groupForCountry->groups)->each(function ($leagueForCountry, $index2) use ($result, $groupBySportType, $groupForCountry) {
                                $result['sportTypes']->get($groupBySportType->sport)->get('countryList')->get($groupForCountry->name)->push(collect(['id' => $leagueForCountry->id, 'leagueName' => $leagueForCountry->name, 'boCount' => $leagueForCountry->boCount]));
                            });
                        }
                    });
                }
            }
        });
        return $result;
    }

    public function getLiveEvents()
    {
        $unibetEvents = ['eventsGroups' => collect([])];
        try {
            $unibetEvents = $this->getUnibetEvents();
            $xbetEvents = $this->getXbetEvents();
            $betAtHomeEvents = $this->getBetAtHomeEvents();
            return $this->sortByDateAndOdds($this->sortByDateAndOdds($unibetEvents, $xbetEvents), $betAtHomeEvents);
        } catch (\Exception $e) {
            return Utils::sliceEventsModel($unibetEvents);
        }
    }

    public function getBetAtHomeEvents()
    {
        $client = new Client();
        $res = $client->get(self::BET_AT_HOME__LIVE_EVENTS);
        $content = $res->getBody()->getContents();
        if (strpos($content, 'xml') !== false) {
            $utf16Content = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $content);
            $betAtHomeGlobalObject = simplexml_load_string($utf16Content);
            Storage::disk('local')->put('betAtHomeTemp.xml', $betAtHomeGlobalObject->asXML());
            $sports = BetAtHomeUtils::buildChildrenList($betAtHomeGlobalObject);
            return $this->convertBetAtHomeToUnibet($sports);
        } else {
            $betAtHomeGlobalObject = simplexml_load_string(Storage::disk('local')->get('betAtHomeTemp.xml'));
            $sports = BetAtHomeUtils::buildChildrenList($betAtHomeGlobalObject);
            return $this->convertBetAtHomeToUnibet($sports);
        }
    }

    public function convertBetAtHomeToUnibet($sports)
    {
        $post_data = collect([]);
        $sports->each(function ($sport, $sportLabel) use ($post_data, $sports) {
            BetAtHomeUtils::buildChildrenList($sport)->each(function ($region, $regionLabel) use ($sport, $post_data, $post_data) {
                BetAtHomeUtils::buildChildrenList($region)->each(function ($league, $leagueLabel) use ($sport, $region, $post_data) {
                    BetAtHomeUtils::buildChildrenList($league)->each(function ($liveEvent, $liveEventLabel) use ($sport, $region, $league, $post_data) {
                        $attrs = $liveEvent->attributes();
                        $betObject = BetAtHomeUtils::buildChildrenList($liveEvent)->first(function ($index, $bet) {
                            return $bet->attributes()->BetTypeCategoryId == '1';
                        });
                        if ($betObject && array_key_exists("{$sport->attributes()->Name}", XBetUtils::$SPORT_MAPPING_TO_UNIBET)) {
                            $OT_ONE = BetAtHomeUtils::buildOddByType($betObject->Odds, '1');
                            $OT_CROSS = BetAtHomeUtils::buildOddByType($betObject->Odds, '0');
                            $OT_TWO = BetAtHomeUtils::buildOddByType($betObject->Odds, '2');
                            $eventJson = array(
                                'event' => array(
                                    'id' => "{$attrs->Id}",
                                    'url' => '',
                                    'name' => "{$attrs->Name}",
                                    'homeName' => "{$attrs->HomeTeam}",
                                    'awayName' => "{$attrs->AwayTeam}",
                                    'start' => "{$attrs->StartDate}",
                                    'group' => "{$league->attributes()->Name}",
                                    'sport' => XBetUtils::$SPORT_MAPPING_TO_UNIBET["{$sport->attributes()->Name}"],
                                    'path' => array(
                                        array(),
                                        array('englishName' => "{$region->attributes()->Name}"),
                                        array()
                                    )
                                ),
                                'mainBetOffer' => array(
                                    'outcomes' => array(
                                        array('type' => 'OT_ONE', 'oddsFractional' => "{$OT_ONE->attributes()->Value}", 'oddsAmerican' => ''),
                                        array('type' => 'OT_CROSS', 'oddsFractional' => $OT_CROSS ? "{$OT_CROSS->attributes()->Value}" : null, 'oddsAmerican' => ''),
                                        array('type' => 'OT_TWO', 'oddsFractional' => "{$OT_TWO->attributes()->Value}", 'oddsAmerican' => '')
                                    )
                                )
                            );
                            $post_data->push($eventJson);
                        }
                    });
                });
            });


        });
        return $this->buildEventsModel(collect(Utils::decodeResponse($post_data))->groupBy('event.sport'), false);
    }


    public function getEventByID($id)
    {
        try {
            $client = new Client();
            $res = $client->get(UnibetUtils::buildEventDetailsURL($id));
            $events = Utils::decodeResponse($res->getBody());

            $odd1 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_ONE"));
            $odd2 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_CROSS"));
            $odd3 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_TWO"));

            $unibetEvent = UnibetUtils::createInstanceForSport($events->events[0]->sport);
            $unibetEvent->homeName = $events->events[0]->homeName;
            $unibetEvent->awayName = $events->events[0]->awayName;
            $unibetEvent->group = $events->events[0]->group;
            $unibetEvent->sportName = $events->events[0]->path[0]->englishName;
            $unibetEvent->countryName = $events->events[0]->path[1]->englishName;
            $unibetEvent->start = Carbon::parse($events->events[0]->start);
            $unibetEvent->url = UnibetUtils::buildGameURLByID($events->events[0]->id);

            $matchedObject = $this->getXbetEvents()['eventsGroups']->get($events->events[0]->sport)->first(function ($index, $xbetSportObject) use ($unibetEvent) {
                return $unibetEvent->equals($xbetSportObject);
            });

            $matchedObject1 = $this->getBetAtHomeEvents()['eventsGroups']->get($events->events[0]->sport)->first(function ($index, $betAtHomeSportObject) use ($unibetEvent) {
                return $unibetEvent->equals($betAtHomeSportObject);
            });

            $eventDetails = [
                'Unibet' => ['url' => $unibetEvent->url, 'odd1' => $odd1, 'odd2' => $odd2, 'odd3' => $odd3],
            ];
            if ($matchedObject) {
                $eventDetails['Xbet'] = ['url' => $matchedObject->url, 'odd1' => $matchedObject ? $matchedObject->oddsFirst : '-', 'odd2' => $matchedObject ? $matchedObject->oddsCross : '-', 'odd3' => $matchedObject ? $matchedObject->oddsSecond : '-'];
            }

            if ($matchedObject1) {
                $eventDetails['BetAtHome'] = ['url' => $matchedObject1->url, 'odd1' => $matchedObject1 ? $matchedObject1->oddsFirst : '-', 'odd2' => $matchedObject1 ? $matchedObject1->oddsCross : '-', 'odd3' => $matchedObject1 ? $matchedObject1->oddsSecond : '-'];
            }

            return [
                'homeName' => $events->events[0]->homeName,
                'awayName' => $events->events[0]->awayName,
                'group' => $events->events[0]->group,
                'sportName' => $events->events[0]->path[0]->englishName,
                'countryName' => $events->events[0]->path[1]->englishName,
                'start' => $events->events[0]->start,
                'eventDetails' => $eventDetails
            ];
        } catch (\Exception $e) {
            return null;
        }
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
                    if ($unibetEventObject->oddsFirst != null) {
                        $resultListForSport->push($unibetEventObject);
                    }
                } else {
                    $unibetEventObject->oddsFirst != null && ($unibetEventObject->oddsFirst > $xbetObject->oddsFirst) ? $resultListForSport->push($unibetEventObject) : $resultListForSport->push($xbetObject);
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

    public function loadGamesByGroupListAndCountry($sport, $country, $groups = array())
    {

//        $unibetEvents = collect($this->getUnibetEvents());
//        $currentSportEvents = $unibetEvents->get('eventsGroups')->get($sport);
//        $filteredGames = $currentSportEvents->filter(function ($item) use ($country, $groups) {
//            return $item->countryName == $country && collect($groups)->contains($item->group);
//        })->groupBy('group');
//
//
//        return ['games' => $filteredGames];
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
                        'url' => $xbetEvent->U,
                        'name' => $xbetEvent->H . " " . $xbetEvent->A,
                        'homeName' => $xbetEvent->H,
                        'awayName' => $xbetEvent->A,

                        'start' => XBetUtils::buildDate($xbetEvent->D),
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
                            array('type' => 'OT_CROSS', 'oddsFractional' => @$xbetEvent->EE[1]->C, 'oddsAmerican' => ''),
                            array('type' => 'OT_TWO', 'oddsFractional' => @$xbetEvent->EE[2]->C, 'oddsAmerican' => '')
                        )
                    )
                );
                $post_data->push($eventJson);
            }
        });
        return $this->buildEventsModel(collect(Utils::decodeResponse($post_data))->groupBy('event.sport'), false);
    }
}