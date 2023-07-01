<?php


if(!function_exists('underscore_to_camel_case')) {
    function underscore_to_camel_case($string, $capitalizeFirstCharacter = false): string
    {

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
}


