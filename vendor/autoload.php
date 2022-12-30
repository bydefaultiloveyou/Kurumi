<?php

use Zafkiel\Classloader;

require __DIR__ . "/Zafkiel/Classloader.php";

Classloader::initialize();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require __DIR__ . "/Kurumi/Functions/view.php";
require __DIR__ . "/Kurumi/Functions/dd.php";
require __DIR__ . "/Kurumi/Functions/redirect.php";
require __DIR__ . '/../routes/web.php';
