<?php

namespace App\Services;

use App\Utils\Utils;
use GuzzleHttp\Client;

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
        $model = array();
        foreach (Utils::SPORT_TYPES as $typeName) {
            $model[$typeName] = $events[$typeName];
        }
        return $model;
    }
}