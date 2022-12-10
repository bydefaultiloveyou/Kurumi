<?php

namespace Templates\Kurumi;

class Kurumi
{
  public function include(string $filename)
  {
    require "./public/" . $filename . ".php";
  }
}
