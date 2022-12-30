<?php

namespace Kurumi\Http;

use Kurumi\Http\Parser;

class Add extends Parser
{
    /**-------------------------------------
     *  Digunakan untuk menyimpan informasi routes
     */
    protected static array $routes;

    /** -------------------------------------
     * function untuk menyimpan informasi route ke variabel
     */
    protected static function route(string $method, string $path, $callback)
    {
        self::$routes[$method . $path] = [
            "method" => $method,
            "path" => Parser::segmen($path),
            "callback" => $callback
        ];
    }
}
