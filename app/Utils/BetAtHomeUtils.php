<?php
/**
 * Created by PhpStorm.
 * User: hgrigoryan
 * Date: 11/20/16
 * Time: 2:53 PM
 */

namespace App\Utils;


class BetAtHomeUtils
{

    public static function buildChildrenList($parentElement)
    {
        $result = collect();
        foreach ($parentElement->children() as $child) {
            $result->push($child);
        }
        return $result;
    }

    public static function buildOddByType($odds, $oddType)
    {
        return self::buildChildrenList($odds)->first(function ($index, $odd) use ($oddType) {
            return $odd->attributes()->Id == $oddType;
        });
    }


}