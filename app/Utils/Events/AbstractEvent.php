<?php

namespace App\Utils\Events;


use App\Utils\Utils;

abstract class AbstractEvent
{
    public $id;
    public $name;
    public $group;
    public $start;
    public $homeName;
    public $awayName;

    public $oddsFirst;
    public $oddsCross;
    public $oddsSecond;

    public $countryName;
    public $url;

    public function equals(AbstractEvent $event)
    {
        return Utils::isNamesLike($this->countryName, $event->countryName) && Utils::isNamesLike($this->homeName, $event->homeName);
    }
}