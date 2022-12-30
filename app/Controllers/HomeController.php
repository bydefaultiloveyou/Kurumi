<?php

/* 
|-------------a-------------------------------------------------------------
| Controllers 
|--------------------------------------------------------------------------
 */

namespace App\Controllers;

class HomeController
{
    public static function home()
    {
        view('welcome');
    }
}
