<?php

namespace App\Utils\Events;


class BasketballEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-53',
            'role' => 'tab',
            'icon' => 'sp53',
            'aria-controls' => 'basketballTab',
            'tabLabel'=>'Basketball'
        ];

    }
}