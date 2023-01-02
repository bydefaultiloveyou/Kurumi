<?php

namespace App\Controllers;

/**
 * Disini kamu bisa mengatur operasi yang dilakukan
 * sesuai dengan route yang sudah dibuat.
 */
class HomeController
{
    public static function home()
    {
        view('welcome');
    }
}
