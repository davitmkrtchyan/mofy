<?php

namespace App\Utils\Events;


class IceHockeyEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-51',
            'role' => 'tab',
            'icon' => 'sp51',
            'aria-controls' => 'ice-hockeyTab',
            'tabLabel'=>'Ice Hockey'
        ];

    }
}