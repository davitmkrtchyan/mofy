<?php

namespace App\Utils\Events;


class VolleyballEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-54',
            'role' => 'tab',
            'icon' => 'sp54',
            'aria-controls' => 'volleyballTab',
            'tabLabel' => 'VolleyBall'
        ];

    }
}