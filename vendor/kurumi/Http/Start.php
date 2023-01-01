<?php

namespace Kurumi\Http;

class Start
{
    public function __construct($routes, $param)
    {

        // Parsing Url dari Browser
        $RequestPath = parse_url($_SERVER["REQUEST_URI"])['path'];

        // Parsing method dari Browser
        $method = $_SERVER["REQUEST_METHOD"];

        // variabel default untuk callback
        $callback = null;

        // looping semua informasi routes yang sudah di definisikan
        foreach ($routes as $route) {

            // check jika routes['path'] itu sama seperti yang di browser
            if ($route["path"] === $RequestPath xor $route["path"] . "/" === $RequestPath) {

                // jika sama check method nya juga
                if (isset($_POST['_method'])) {

                    // jika keduanya sama maka isi variabel $callback dengan function yang telah sudah berikan
                    if ($route['method'] === $_POST['_method']) $callback = $route["callback"];
                }

                // jika keduanya sama maka isi variabel $callback dengan function yang telah sudah berikan
                if ($route["method"] === $method) $callback = $route["callback"];
            }
        }

        // jika ada url anonymus keluarkan page 404
        if (!$callback)
            $callback = fn () => include __DIR__ . '/pages/404.php';

        // jalankan $callbacknya
        call_user_func_array($callback, [
            [
                array_merge($_GET, $_POST),
                $param
            ]
        ]);
    }
}
