<?php

namespace PrepaidHoster\Api\Support;

class HeadersToArray
{
    public static function parse($str)
    {
        $headers = array();
        $headersTmpArray = explode("\r\n", $str);
        for ($i = 0; $i < count($headersTmpArray); ++$i) {
            // we dont care about the two \r\n lines at the end of the headers
            if (strlen($headersTmpArray[$i]) === 0) {
                continue;
            }

            // the headers start with HTTP status codes, which do not contain a colon so we can filter them out too
            $strPos = strpos($headersTmpArray[$i], ":");
            if ($strPos === false) {
                continue;
            }

            $headerName = substr($headersTmpArray[$i], 0, $strPos);
            $headerValue = substr($headersTmpArray[$i], $strPos + 1);
            $headers[$headerName] = $headerValue;
        }
        return $headers;
    }
}