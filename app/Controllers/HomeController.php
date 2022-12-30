<?php

namespace App\Controllers;


/**
 * Disini kamu bisa mengatur operasi yang diilakukan
 * sesuai dengan route yang sudah dibuat.
 */
class HomeController
{
    public static function home()
    {
        view('welcome');
    }
}
