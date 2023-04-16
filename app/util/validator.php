<?php

namespace Util;

class Validator
{
    public static function isValidEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    public static function isValidLength($text, $minLen, $maxLen = 150)
    {
        /**
         * if it is provided then it should be greater than min len
         */
        if($maxLen < $minLen)
            return false;
        if (strlen($text) > $minLen and strlen($text) < $maxLen)
            return true;
        else
            return false;
    }
}
