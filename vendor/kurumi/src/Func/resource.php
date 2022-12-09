<?php

/**
 *  asset berfungsi untuk mengarahkan file css / js
 *  public/**
 */
function asset(string $filename)
{
  echo "./public/" . $filename;
}
