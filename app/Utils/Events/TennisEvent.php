<?php

namespace App\Utils\Events;


class TennisEvent extends AbstractEvent
{
    public static function getViewProperties()
    {
        return [
            'id' => 'tab-52',
            'role' => 'tab',
            'icon' => 'sp52',
            'aria-controls' => 'tennisTab',
            'tabLabel'=>'Tennis'
        ];

    }
}