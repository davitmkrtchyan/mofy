<?php
namespace App\Utils;


class Utils
{
    const JSON_TYPE = 'json';
    const XML_TYPE = 'xml';

    public static function decodeResponse($data)
    {
        $type = self::getGlobalResponseType();
        if ($type == self::JSON_TYPE) {
            return json_decode($data);
        } else {
            return json_decode($data);
        }
    }

    public static function getGlobalResponseType()
    {
        return self::JSON_TYPE;
    }

    public static function convertAmericanOddToDecimal($value)
    {
        $result = $value[0] === '-' ? (100 / floatval(substr($value, 1)) + 1) : (floatval($value) / 100 + 1);
        return round($result, 2);
    }
}