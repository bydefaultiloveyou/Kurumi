<?php

function view(string $path, $data = [])
{
  require './public/' . $path . '.php';
}
