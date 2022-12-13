<?php

namespace Kurumi\Templates;

class Kurumi
{
  const directoy =  __DIR__ . '/../../../../resources/';

  public function include(string $path)
  {
    include self::directoy . $path . '.php';
  }

  public function asset(string $path)
  {
    echo  self::directoy . $path . '.php';
  }
}
