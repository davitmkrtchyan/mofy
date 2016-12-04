<?php
/**
 * Created by PhpStorm.
 * User: hgrigoryan
 * Date: 12/4/16
 * Time: 7:27 PM
 */

namespace App\Utils;


class LeftMenu
{

    public static function getSportNames(){
       return self::getGroupsListToFill()['sportTypes']->keys();
    }

    public static function getGroupsListToFill(){
       return ['sportTypes' => collect([
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
                'logo' => 's97',
                'name' => 'Horse Racing',
                'countryList' => collect([])
            ]),
            'GOLF' => collect([
                'logo' => 's102',
                'name' => 'Go',
                'countryList' => collect([])
            ]),
            'VOLLEYBALL' => collect([
                'logo' => 's54',
                'name' => '',
                'countryList' => collect([])
            ]),
            'BOXING' => collect([
                'logo' => 's57',
                'name' => '',
                'countryList' => collect([])
            ]),
            'CRICKET' => collect([
                'logo' => 's75',
                'name' => '',
                'countryList' => collect([])
            ]),
            'DARTS' => collect([
                'logo' => 's69',
                'name' => '',
                'countryList' => collect([])
            ]),
            'GREYHOUNDS' => collect([
                'logo' => 's98',
                'name' => '',
                'countryList' => collect([])
            ]),
            'GALLOPS' => collect([
                'logo' => 's103',
                'name' => '',
                'countryList' => collect([])
            ]),
            'MOTORSPORTS' => collect([
                'logo' => 's99',
                'name' => '',
                'countryList' => collect([])
            ]),
            'RUGBY_LEAGUE' => collect([
                'logo' => 's61',
                'name' => '',
                'countryList' => collect([])
            ]),
            'BANDY' => collect([
                'logo' => 's100',
                'name' => '',
                'countryList' => collect([])
            ]),
            'CHESS' => collect([
                'logo' => 's66',
                'name' => '',
                'countryList' => collect([])
            ]),
            'CYCLING' => collect([
                'logo' => 's101',
                'name' => '',
                'countryList' => collect([])
            ]),
            'HANDBALL' => collect([
                'logo' => 's55',
                'name' => '',
                'countryList' => collect([])
            ]),
//            'ESPORTS' => collect([
//                'logo' => 's54',
//                'name' => '',
//                'countryList' => collect([])
//            ]),
        ])];
    }

}