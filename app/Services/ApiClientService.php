<?php

namespace App\Services;

use App\Utils\BetAdoinsUtils;
use App\Utils\BetAtHomeUtils;
use App\Utils\Events\GroupEvent;
use App\Utils\Events\SureBet;
use App\Utils\Group\SportGroup;
use App\Utils\LeftMenu;
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
    const XBET_MATCH_EVENTS = "https://part.upnp.xyz/PartLine/GetAllFeedGames?lng=en&tf=300";
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
        $result = LeftMenu::getGroupsListToFill();
        $groups->each(function ($groupBySportType, $index) use ($result) {
            if ( in_array($groupBySportType->sport, $result['sportTypes']->keys()->toArray())) {
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

    public function getSurebets()
    {
        $unibetEvents = ['eventsGroups' => collect([])];
        try {
            $unibetEvents = $this->getUnibetEvents();
            $xbetEvents = $this->getXbetEvents();
            $betAtHomeEvents = $this->getBetAtHomeEvents();
            $betAdoinsEvents = $this->getBetAdoinsEvents();
            return $this->filterSurebets($unibetEvents, $xbetEvents, $betAtHomeEvents, $betAdoinsEvents);

        } catch (\Exception $e) {
            return Utils::sliceEventsModel($unibetEvents);
        }
    }


    private function filterSurebets($unibetEvents, $xbetEvents, $betAtHomeEvents, $betAdoinsEvents, $applyRestriction = true)
    {
        $result = collect(['eventsGroups' => collect([])]);
        if ($applyRestriction) {
            $unibetEvents['eventsGroups']->each(function ($unibetEventsForSport, $sportName) use ($xbetEvents, &$result, $betAtHomeEvents, $betAdoinsEvents, $applyRestriction) {
                $resultListForSport = collect([]);
                $unibetFilteredByDateListForCurrentSport = Utils::sortEventsByDate($unibetEventsForSport, $applyRestriction);
                $xbetFilteredByUnibetGames = collect([]);

                $unibetFilteredByDateListForCurrentSport->each(function ($unibetEventObject) use ($resultListForSport, $xbetEvents, $sportName, $betAtHomeEvents, $betAdoinsEvents, $xbetFilteredByUnibetGames) {
                    $eventsToCompare = collect(['unibet' => $unibetEventObject, 'xbet' => null, 'betathome' => null, 'betadoins' => null]);
                    if ($xbetEvents['eventsGroups']->get($sportName) != null) {
                        $matchingGame = $xbetEvents['eventsGroups']->get($sportName)->first(function ($index, $xbetEventObject) use ($unibetEventObject) {
                            return $unibetEventObject->equals($xbetEventObject);
                        });
                        if ($matchingGame != null) {
                            $eventsToCompare->put('xbet', $matchingGame);
                        }
                    }
                    if ($betAtHomeEvents['eventsGroups']->get($sportName) != null) {
                        $matchingGame1 = $betAtHomeEvents['eventsGroups']->get($sportName)->first(function ($index, $betAtHomeEventObject) use ($unibetEventObject) {
                            return $unibetEventObject->equals($betAtHomeEventObject);
                        });
                        if ($matchingGame1 != null) {
                            $eventsToCompare->put('betathome', $matchingGame1);
                        }
                    }
                    if ($betAdoinsEvents['eventsGroups']->get($sportName) != null) {
                        $matchingGame2 = $betAdoinsEvents['eventsGroups']->get($sportName)->first(function ($index, $betAdoinsEventObject) use ($unibetEventObject) {
                            return $unibetEventObject->equals($betAdoinsEventObject);
                        });
                        if ($matchingGame2 != null) {
                            $eventsToCompare->put('betadoins', $matchingGame2);
                        }
                    }

                    $maxEventByFirst = $eventsToCompare['unibet'];
                    $maxBookmakerByFirst = 'unibet';

                    $maxEventBySecond = $eventsToCompare['unibet'];
                    $maxBookmakerBySecond = 'unibet';

                    $maxEventByCross = $eventsToCompare['unibet'];
                    $maxBookmakerByCross = 'unibet';

                    $surebet = new SureBet();
                    $surebet->id = $unibetEventObject->id;
                    $surebet->name = $unibetEventObject->name;
                    $surebet->group = $unibetEventObject->group;
                    $surebet->start = $unibetEventObject->start;
                    $surebet->homeName = $unibetEventObject->homeName;
                    $surebet->awayName = $unibetEventObject->awayName;
                    $surebet->countryName = $unibetEventObject->countryName;
                    $surebet->url = $unibetEventObject->url;

                    //start comparing
                    $eventsToCompare->each(function ($event, $bookmaker) use (
                        $resultListForSport, $unibetEventObject, &$maxEventByFirst, &$maxEventByCross, &$maxEventBySecond,
                        &$maxBookmakerByFirst, &$maxBookmakerByCross, &$maxBookmakerBySecond
                    ) {
                        if ($event != null) {
                            if ($event->oddsFirst > $maxEventByFirst->oddsFirst) {
                                $maxEventByFirst = $event;
                                $maxBookmakerByFirst = $bookmaker;
                            }
                            if ($event->oddsSecond > $maxEventBySecond->oddsSecond) {
                                $maxEventBySecond = $event;
                                $maxBookmakerBySecond = $bookmaker;
                            }
                            if ($event->oddsCross > $maxEventByCross->oddsCross) {
                                $maxEventByCross = $event;
                                $maxBookmakerByCross = $bookmaker;
                            }
                        }
                    });//end comparing
                    $surebet->oddsFirst = $maxEventByFirst->oddsFirst;
                    $surebet->oddsSecond = $maxEventByFirst->oddsSecond;
                    $surebet->oddsCross = $maxEventByFirst->oddsCross;
                    $surebet->oddsFirstName = $maxBookmakerByFirst;
                    $surebet->oddsSecondName = $maxBookmakerBySecond;
                    $surebet->oddsCrossName = $maxBookmakerByCross;
                    $sumOfOdds= Utils::calculateProfit($surebet);
                    if($sumOfOdds>1){
                        $surebet->profitPercentage=-round(($sumOfOdds-1)*100,2);
                    }else{
                        $surebet->profitPercentage=round((1-$sumOfOdds)*100,2);
                    }
                    $resultListForSport->push($surebet);
                });
                $result['eventsGroups']->put($sportName, $resultListForSport);
            });
        }
        return $result;
    }


    public function getLiveEvents($request, $applyRestriction = true)
    {
        try {
            $unibetEvents = $this->getUnibetEvents();
            $request->session()->put('unibetStorage', $unibetEvents);

            $xbetEvents = $this->getXbetEvents();
            $request->session()->put('xbetStorage', $xbetEvents);

            $betAtHomeEvents = $this->getBetAtHomeEvents();
            $request->session()->put('betAtHome', $betAtHomeEvents);

            $betAdoinsEvents = $this->getBetAdoinsEvents();
            $request->session()->put('betAdoins', $betAdoinsEvents);

            $sorted1 = $this->sortByDateAndOdds($unibetEvents, $xbetEvents, $applyRestriction);
            $sorted2 = $this->sortByDateAndOdds($sorted1, $betAtHomeEvents, $applyRestriction);
            $sorted3 = $this->sortByDateAndOdds($sorted2, $betAdoinsEvents, $applyRestriction);

            return $sorted3;
        } catch (\Exception $e) {
            return Utils::sliceEventsModel($unibetEvents);
        }
    }

    public function getMatches($request){
        try{
            $client = new Client();
            $res = $client->get(self::XBET_MATCH_EVENTS);
            $xbetEvents = Utils::decodeResponse($res->getBody());
            $events = $this->convertXbetToUnibet(collect($xbetEvents));
            return $events;

        }catch (\Exception $e){
            $this->getLiveEventALL($request);
        }

    }

    public function getLiveEventALL($request)
    {
        $unibetEvents = ['eventsGroups' => collect([])];
        try {
            $unibetEvents = $this->getUnibetEvents();
            $request->session()->put('unibetStorage', $unibetEvents);

            $xbetEvents = $this->getXbetEvents();
            $request->session()->put('xbetStorage', $xbetEvents);

            $sorted1 = $this->sortByDateAndJoin($unibetEvents, $xbetEvents);
            return $sorted1;
        } catch (\Exception $e) {
            return Utils::sliceEventsModel($unibetEvents);
        }
    }

    public function sortByDateAndJoin($unibetEvents, $xbetEvents)
    {
        $result = collect(['eventsGroups' => collect([])]);
        $unibetEvents['eventsGroups']->each(function ($unibetEventsForSport, $sportName) use ($xbetEvents, $result) {
            $resultListForSport = collect([]);
            $unibetFilteredByDateListForCurrentSport = Utils::sortEventsByDate($unibetEventsForSport,false);
            $resultListForSport = $resultListForSport->merge($unibetFilteredByDateListForCurrentSport);

            if (sizeof($xbetEvents['eventsGroups'])>0 && $xbetEvents['eventsGroups'][$sportName] != null) {
                $resultListForSport = $resultListForSport->merge(Utils::sortEventsByDate($xbetEvents['eventsGroups'][$sportName], false));
            }

            $result['eventsGroups']->put($sportName, $resultListForSport);
        });
        return $result;
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


    public function getEventByID($id,$surebet=false)
    {
        try {
            $client = new Client();
            $res = $client->get($surebet?UnibetUtils::buildEventDetailsURLFromSurebet($id):UnibetUtils::buildEventDetailsURL($id));
            $events = Utils::decodeResponse($res->getBody());

            $odd1 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_ONE"));
            $odd2 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_CROSS"));
            $odd3 = Utils::convertAmericanOddToDecimal(Utils::getAmericanOddByType($events->betoffers[0]->outcomes, "OT_TWO"));

            $unibetEvent = UnibetUtils::createInstanceForSport($events->events[0]->sport);
            $unibetEvent->id = $events->events[0]->id;
            $unibetEvent->homeName = $events->events[0]->homeName;
            $unibetEvent->awayName = $events->events[0]->awayName;
            $unibetEvent->group = $events->events[0]->group;
            $unibetEvent->sportName = $events->events[0]->path[0]->englishName;
            $unibetEvent->countryName = $events->events[0]->path[1]->englishName;
            $unibetEvent->start = Carbon::parse($events->events[0]->start);
            $unibetEvent->url = UnibetUtils::buildGameURLByID($events->events[0]->id,$surebet);

            $matchedObject=null;
            $matchedObject1=null;
            $matchedObject2=null;

            if(!$surebet){
                $xbetEventsGroups= $this->getXbetEvents()['eventsGroups']->get($events->events[0]->sport);
                if($xbetEventsGroups){
                 $matchedObject = $xbetEventsGroups->first(function ($index, $xbetSportObject) use ($unibetEvent) {
                     return $unibetEvent->equals($xbetSportObject);
                 });
                }

                $betathomeEventsGroups= $this->getBetAtHomeEvents()['eventsGroups']->get($events->events[0]->sport);
                if($betathomeEventsGroups){
                 $matchedObject1 = $betathomeEventsGroups->first(function ($index, $betAtHomeSportObject) use ($unibetEvent) {
                     return $unibetEvent->equals($betAtHomeSportObject);
                 });
                 if ($matchedObject1) {
                     $matchedObject1->id = $unibetEvent->id;
                     $matchedObject1->url = $unibetEvent->url;
                 }
                }


                $betadoinsEventsGroups=$this->getBetAdoinsEvents()['eventsGroups']->get($events->events[0]->sport);
                if($betadoinsEventsGroups){
                 $matchedObject2 = $betadoinsEventsGroups->first(function ($index, $betAdoinsHomeSportObject) use ($unibetEvent) {
                     return $unibetEvent->equals($betAdoinsHomeSportObject);
                 });
                 if ($matchedObject2) {
                     $matchedObject2->id = $unibetEvent->id;
                     $matchedObject2->url = $unibetEvent->url;
                 }
                }
            }

            $eventDetails = [
                'Unibet' => ['url' => $unibetEvent->url, 'odd1' => $odd1, 'odd2' => $odd2, 'odd3' => $odd3],
            ];
            if ($matchedObject) {
                $eventDetails['Xbet'] = ['url' => $matchedObject->url, 'odd1' => $matchedObject ? $matchedObject->oddsFirst : '-', 'odd2' => $matchedObject ? $matchedObject->oddsCross : '-', 'odd3' => $matchedObject ? $matchedObject->oddsSecond : '-'];
            }

            if ($matchedObject1) {
                $eventDetails['BetAtHome'] = ['url' => $matchedObject1->url, 'odd1' => $matchedObject1 ? $matchedObject1->oddsFirst : '-', 'odd2' => $matchedObject1 ? $matchedObject1->oddsCross : '-', 'odd3' => $matchedObject1 ? $matchedObject1->oddsSecond : '-'];
            }

            if ($matchedObject2) {
                $eventDetails['BetAdoins'] = ['url' => $matchedObject2->url, 'odd1' => $matchedObject2 ? $matchedObject2->oddsFirst : '-', 'odd2' => $matchedObject2 ? $matchedObject2->oddsCross : '-', 'odd3' => $matchedObject2 ? $matchedObject2->oddsSecond : '-'];
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


    //-----------------BY GROUP-----------------------------------//

    public function loadGroupEvents($id){
        $client = new Client();
        $res = $client->get(UnibetUtils::buildGroupEventsURL($id));
        $events = Utils::decodeResponse($res->getBody());
        return $this->buildEventGroupsModel(collect($events->events));
    }

    public function buildEventGroupsModel($events){
        $result=collect(['events'=>collect()]);
        $events->each(function ($event, $index) use($result){
            $parsedObject=new GroupEvent();
            $parsedObject->id=$event->id;
            $parsedObject->name=$event->name;
            $parsedObject->group=$event->group;
            $parsedObject->start=Carbon::parse($event->start);;
            $parsedObject->homeName=$event->homeName;
            if(array_key_exists('awayName',$event)){
                $parsedObject->awayName=$event->awayName;
            }
            $parsedObject->oddsFirst='-';
            $parsedObject->oddsSecond='-';
            $parsedObject->oddsCross='-';
            $parsedObject->countryName=$event->path[1]->englishName;
            $parsedObject->url=UnibetUtils::buildGameURLForSureBet($event->id);
            $result['events']->push($parsedObject);
        });
        return $result;
    }

    //----------------------------------------------------------//

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

    public function getBetAdoinsEvents()
    {
        $post_data = collect([]);
        foreach (BetAdoinsUtils::$URLS as $sportName => $url) {
            if ($url != null) {
                $client = new Client();
                $res = $client->get($url);
                $content = $res->getBody()->getContents();
                $betAdoinsObjectForSport = simplexml_load_string($content);
                BetAdoinsUtils::convertBetAdoinsForSportToUnibet($post_data, $sportName, BetAdoinsUtils::extractCountyList($betAdoinsObjectForSport));
            }
        }
        return $this->buildEventsModel(collect(Utils::decodeResponse($post_data))->groupBy('event.sport'), false);
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

    private function sortByDateAndOdds($unibetEvents, $xbetEvents, $applyRestriction = true)
    {
        $result = collect(['eventsGroups' => collect([])]);
            $unibetEvents['eventsGroups']->each(function ($unibetEventsForSport, $sportName) use ($xbetEvents, $result, $applyRestriction) {
                $resultListForSport = collect([]);
                $unibetFilteredByDateListForCurrentSport = Utils::sortEventsByDate($unibetEventsForSport, $applyRestriction);
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
        $countChecker=collect();
        $xbetEvents->each(function ($xbetEvent, $key) use ($post_data,$countChecker) {
            if ($xbetEvent->P == "0" && XBetUtils::sportIsSupported($xbetEvent->S)) {
                if(!$countChecker->keys()->contains($xbetEvent->S)){
                    $countChecker->put($xbetEvent->S,1);
                }else{
                    $countChecker->put($xbetEvent->S,$countChecker->get($xbetEvent->S)+1);
                }

              if($countChecker->get($xbetEvent->S)<251){
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
            }
        });
        return $this->buildEventsModel(collect(Utils::decodeResponse($post_data))->groupBy('event.sport'), false);
    }
}