<?php


/** -----------------------------------------------------
 *  Require Autoload
 */
require __DIR__ . "/zafkiel/Classloader.php";

(new zafkiel\Classloader())->Intialize();


/** --------------------------------------------------
 * Run Whoops
 */
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/** --------------------------------------------------
 * Run define variable
 */
$_define = new \Kurumi\Variable\define;

/** -------------------------------------------------
 *  Require Function
 */
require __DIR__ . '/kurumi/Functions/load.php';


/** -----------------------------------------------
 *  Require Routes
 */
require __DIR__ . '/../routes/web.php';
