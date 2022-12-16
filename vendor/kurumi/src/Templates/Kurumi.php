<?php

namespace Kurumi\Templates;

class Kurumi
{
  const directoy =  __DIR__ . '/../../../../storage/framework/views/';

  public function include(string $path)
  {
    include self::directoy . $path . '.kurumi.php';
  }

  public function asset(string $path)
  {
    echo  __DIR__ . '/../../../../resources/' . $path . '.kurumi.php';
  }
}
