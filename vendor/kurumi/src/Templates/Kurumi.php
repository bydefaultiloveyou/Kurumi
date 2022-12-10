<?php

namespace Kurumi\Templates;

class Kurumi
{
  public function include(string $path)
  {
    include './public/' . $path . '.php';
  }

  public function asset(string $path)
  {
    echo './public/' . $path . '.php';
  }
}
