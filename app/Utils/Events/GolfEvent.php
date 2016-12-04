<?php

namespace App\Utils\Events;


class GolfEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-50',
            'role' => 'tab',
            'icon' => 'sp50',
            'aria-controls' => 'golfTab',
            'tabLabel'=>'Golf'
        ];

    }
}