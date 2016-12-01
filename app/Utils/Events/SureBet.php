<?php
namespace App\Utils\Events;

class SureBet extends AbstractEvent
{
    public $oddsFirstName;
    public $oddsSecondName;
    public $oddsCrossName;
    public $profitPercentage;
}