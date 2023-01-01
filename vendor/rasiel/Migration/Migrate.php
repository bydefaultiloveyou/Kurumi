<?php

// require connection
require __DIR__ . "/../Connect.php";
require __DIR__ . "/MigrationQuery.php";

// directory
$file_migrations = __DIR__ . "/../../../database/Migrations/*php";

// mengambil nama class
function Classname($file)
{
    $directory = explode("/", $file);
    $basename = str_replace('.php', '', end($directory));
    echo "Migrate " . strtolower(str_replace('Migration', '', $basename)) . "s ";
    return "Database\Migrations\\" . $basename;
}

echo "Start Migrate\n";

foreach (glob($file_migrations) as $file) {
    require $file;
    $class = Classname($file);
    (new $class)->up();
    echo "Finish \n";
}

echo "All table migrate successfull";
