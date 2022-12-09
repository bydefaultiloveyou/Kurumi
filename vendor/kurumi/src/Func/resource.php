<?php

/**
 *  section digunakan untuk include components di folder
 *  public/views/**
 */


/**
 *  asset berfungsi untuk mengarahkan file css / js
 *  public/**
 */
function asset(string $filename)
{
  echo "./public/" . $filename;
}
