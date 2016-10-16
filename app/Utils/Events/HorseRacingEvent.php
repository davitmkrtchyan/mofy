<?php

namespace App\Utils\Events;


class HorseRacingEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-93',
            'role' => 'tab',
            'icon' => 'sp93',
            'aria-controls' => 'horse-racingTab',
            'tabLabel'=>'Horse Racing'
        ];

    }
}