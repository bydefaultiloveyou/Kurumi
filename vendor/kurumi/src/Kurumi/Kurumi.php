<?php

class Kurumi
{
  public function include(string $filename)
  {
    require "./public/" . $filename . ".php";
  }
}
