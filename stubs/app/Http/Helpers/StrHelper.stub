<?php

namespace App\Http\Helpers;

class StrHelper
{
    /**
     * Highlighting matching string
     *
     * @param   string  $needle          search string
     * @param   string  $haystack           subject
     * @return  string  highlighted text
     */
    public static function highlight($needle, $haystack)
    {
        if (! empty($needle)) {

            $tag = '<mark>$0</mark>';

            if (strpos($needle, '/')) {
                return $haystack;
            }

            $highlighted = preg_filter('/' . preg_quote($needle) . '/i', $tag, $haystack);

            if (!empty($highlighted)) {
                $haystack = $highlighted;
            }
        }

        return $haystack;
    }
}
