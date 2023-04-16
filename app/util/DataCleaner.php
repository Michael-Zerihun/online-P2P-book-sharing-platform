<?php

namespace Util;

class DataCleaner
{
    public static function sanitizeInput($string)
    {
        $patterSlash = "/[\\\+]/m";
        $patterQuote = "/['+]/m";
        $text = preg_replace($patterSlash, "\\\\\\", $string);
        $text = preg_replace($patterQuote, "\\\'", $text);
        return $text;
    }
}
