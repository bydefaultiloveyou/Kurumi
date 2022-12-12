<?php

namespace Kurumi\Consoles;

class Kurumi
{

  private $short_options = "c:",
    $long_options = [
      "make::Controller:"
    ],
    $options;

  public function __construct()
  {
    $this->options = getopt($this->short_options, $this->long_options);
    $this->getMethod();
  }

  public function getMethod()
  {
    $this->handleError();
    $this->createController();
    $this->server();
  }

  public function handleError()
  {
    global $argv;
    if ($this->options === [] and @!$argv[1]) {
      echo "
Welcome to Kurumi Framework

Mini Framework for PHP Native, project open source!!
Lets contribute https://github.com/bydefaultiloveyou/Kurumi.git

if you get this output on your input, that mean your command wrong
please check in bottom for your input

===== kurumi command =====

--make::Controller <NameController>           for make a file controller handler
  | -c <NameController>                       -> same function, for make a file controller handler

";
    }
  }


  public function randQuetes()
  {
    $quetes = [
      #"sebodoh bodohnya kamu \n  jangan pernah nyoba programming.",
      "jika mereka menolak untuk menerima mu \n   maka aku akan menerimamu apa adanya!.",
      "apapun yang kamu lalukan pastikan \n   itu membuat kamu bahagia.",
      "untuk mencapai tujuan kita \n   kita harus mengejarnya sendiri.",
      "aku ingin memiliki kenangan bersama mu \n   dan juga aku ingin kau juga memiliki kenangan bersamaku."
    ];

    return $quetes[array_rand($quetes)];
  }

  public function createController()
  {
    if (isset($this->options["c"]) or isset($this->options["make::Controller"])) {
      $filename = isset($this->options["c"]) ? $this->options["c"] : $this->options["make::Controller"];
      if (file_exists("./" . $filename . ".php")) {
        echo "

    File Al Ready Exist

    ";
        die;
      }
      try {
        $newFile = fopen('./app/Controllers/' . $filename . ".php", "w");
        $string  = "<?php

namespace App\Controllers;

class " . $filename . "
{
  // write method in here
}";

        fwrite($newFile, $string);
        fclose($newFile);
        echo "

    File Creating Success

    ";
      } catch (\Throwable $th) {
        echo "

    Cannot Create File

    ";
      }
    }
  }
  public function server()
  {
    global $argv;
    if (@$argv[1] == 'server') {
      echo "
 Kurumi server running:

   \033[0;32m local: http://localhost:3000/
   \033[0;32m ip: http://127.0.0.1:3000/
   \033[0;0m
   Tokisaki Kurumi:
   {$this->randQuetes()}
";
      if (PHP_OS == 'Linux') {
        system('php -S localhost:3000 > /dev/null 2>&1');
      } else {
        system('php -S localhost:3000 > NUL');
      }
    }
  }
}
