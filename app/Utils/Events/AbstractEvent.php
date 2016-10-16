<?php
/**
 * Created by PhpStorm.
 * User: hgrigoryan
 * Date: 10/9/16
 * Time: 8:16 PM
 */

namespace App\Utils\Events;


abstract class AbstractEvent
{
    public $name;
    public $group;
    public $start;
    public $homeName;
    public $awayName;
}