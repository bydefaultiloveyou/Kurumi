<?php

namespace Kurumi\Templates;

class Kurumi
{
  public function include(string $path)
  {
    include './resources/' . $path . '.php';
  }

  public function asset(string $path)
  {
    echo './resources/' . $path . '.php';
  }
}
