<?php
/**
 * Created by PhpStorm.
 * User: hgrigoryan
 * Date: 11/20/16
 * Time: 7:23 PM
 */

namespace App\Services;

use App\Utils\Utils;
use  Illuminate\Http\Request;

class SearchService
{

    public function search(Request $request)
    {
        $result = ['eventsGroups' => collect([])];
        $resultList = collect([]);

        $unibetEvents = $request->session()->get('unibetStorage')['eventsGroups'];
        $unibetEvents->each(function ($unibetEventsForSport, $sportName) use ($request, $resultList) {
            $resultList[$sportName] = collect();
            $unibetEventsForSport->each(function ($unibetEventForSport, $key) use ($request, $resultList, $sportName) {
                $isFound = stripos($unibetEventForSport->homeName, $request->gameName) !== false;
                $isFound = $isFound || stripos($unibetEventForSport->awayName, $request->gameName) !== false;
                $isFound = $isFound || stripos($unibetEventForSport->countryName, $request->gameName) !== false;
                if ($isFound) {
                    $resultList[$sportName]->push($unibetEventForSport);
                }
            });
        });
        $result['eventsGroups'] = $resultList;
        return $result;
    }

}