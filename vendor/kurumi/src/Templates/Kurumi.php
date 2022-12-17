<?php

namespace Kurumi\Templates;

class Kurumi
{
  const directoy =  __DIR__ . '/../../../../storage/framework/views/';

  public function include(string $path)
  {
    include self::directoy . $path . '.kurumi.php';
  }
}
