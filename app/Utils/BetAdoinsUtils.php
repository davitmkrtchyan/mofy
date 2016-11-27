<?php
/**
 * Created by PhpStorm.
 * User: hgrigoryan
 * Date: 11/27/16
 * Time: 9:42 AM
 */

namespace App\Utils;


use Carbon\Carbon;

class BetAdoinsUtils
{

    public static $URLS = [
        'FOOTBALL' => "https://services.allcomponent.net/feed/r1pxml/en/0066/1/Soccer.xml",
        'TENNIS' => "https://services.allcomponent.net/feed/r1pxml/en/0066/5/Tennis.xml",
        'BASKETBALL' => "https://services.allcomponent.net/feed/r1pxml/en/0066/2/Basketball.xml",
        'BASEBALL' => "https://services.allcomponent.net/feed/r1pxml/en/0066/3/Baseball.xml",
    ];

    public static function getURLForSport($sportName)
    {
        if (key_exists($sportName, self::$URLS)) {
            return self::$URLS[$sportName];
        }
    }


    public static function extractCountyList($xml)
    {
        $result = collect();
        foreach ($xml->Sport->children() as $child) {
            $result->push($child);
        }
        return $result;
    }

    public static function getHomeName($matchXML)
    {
        $homeParticipant = BetAtHomeUtils::buildChildrenList($matchXML->Participants)->first(function ($index, $participant) {
            return $participant->attributes()->type == "home";
        });

        return "{$homeParticipant->attributes()->name}";
    }

    public static function getAwayName($matchXML)
    {
        $awayParticipant = BetAtHomeUtils::buildChildrenList($matchXML->Participants)->first(function ($index, $participant) {
            return $participant->attributes()->type == "away";
        });

        return "{$awayParticipant->attributes()->name}";
    }

    public static function getOdds($matchXML)
    {
        $result = collect(["OT_ONE" => "", "OT_TWO" => "", "OT_CROSS" => ""]);
        BetAtHomeUtils::buildChildrenList($matchXML->MatchOdds->BettingOffer)->each(function ($oddXML, $index) use ($result) {
            if ($oddXML->attributes()->outcome == '1') {
                $result->put('OT_ONE', "{$oddXML}");
            }
            if ($oddXML->attributes()->outcome == '2') {
                $result->put('OT_TWO', "{$oddXML}");
            }
            if ($oddXML->attributes()->outcome == 'X') {
                $result->put('OT_CROSS', "{$oddXML}");
            }
        });
        return $result;
    }

    public static function convertBetAdoinsForSportToUnibet($post_data,$sportName, $countryList)
    {
        $countryList->each(function ($gamesForCountryXML, $index) use ($sportName, $post_data) {
            $leagues = BetAtHomeUtils::buildChildrenList($gamesForCountryXML);
            $leagues->each(function ($matchesForLeagueXML, $index1) use ($gamesForCountryXML, $sportName, $post_data) {
                $matches = BetAtHomeUtils::buildChildrenList($matchesForLeagueXML);
                $matches->each(function ($matchXML, $index3) use ($gamesForCountryXML, $matchesForLeagueXML, $sportName, $post_data) {
                    $homeName = BetAdoinsUtils::getHomeName($matchXML);
                    $awayName = BetAdoinsUtils::getAwayName($matchXML);
                    $odds = BetAdoinsUtils::getOdds($matchXML);
                    $eventJson = array(
                        'event' => array(
                            'id' => "{$matchXML->attributes()->Id}",
                            'url' => '',
                            'name' => $homeName . '-' . $awayName,
                            'homeName' => $homeName,
                            'awayName' => $awayName,
                            'start' => Carbon::createFromFormat('d/m/Y H:i:s', "{$matchXML->StartDate}")->toDateTimeString(),
                            'group' => "{$matchesForLeagueXML->attributes()->name}",
                            'sport' => $sportName,
                            'path' => array(
                                array(),
                                array('englishName' => "{$gamesForCountryXML->attributes()->name}"),
                                array()
                            )
                        ),
                        'mainBetOffer' => array(
                            'outcomes' => array(
                                array('type' => 'OT_ONE', 'oddsFractional' => "{$odds['OT_ONE']}", 'oddsAmerican' => ''),
                                array('type' => 'OT_CROSS', 'oddsFractional' => "{$odds['OT_CROSS']}" ?: null, 'oddsAmerican' => ''),
                                array('type' => 'OT_TWO', 'oddsFractional' => "{$odds['OT_TWO']}", 'oddsAmerican' => '')
                            )
                        )
                    );
                    $post_data->push($eventJson);
                });
            });
        });
        return $post_data;
    }
}