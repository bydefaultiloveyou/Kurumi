<?php

namespace Kurumi\Http;


interface RouteInterface
{
    public static function get(string $path, $callback);
    public static function post(string $path, $callback);
    public static function put(string $path, $callback);
    public static function delete(string $path, $callback);
    public static function run();
}
