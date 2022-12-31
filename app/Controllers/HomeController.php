<?php

namespace App\Controllers;

use App\Models\Task;

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
