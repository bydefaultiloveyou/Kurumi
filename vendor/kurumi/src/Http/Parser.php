<?php

namespace Kurumi\Http;

class Parser
{
    protected static $parameter;

    protected static function segmen(string $path)
    {
        if (preg_match('/{.*}/i', $path)) {
            $p = explode("/", $path);
            $q = explode('/', parse_url($_SERVER["REQUEST_URI"])["path"]);
            $d = array_search('{:segmen}', $p);
        }

        $path = @preg_replace('/{.*}/i', @$q[$d], $path);
        self::$parameter =  @$q[$d];
        return $path;
    }
}
