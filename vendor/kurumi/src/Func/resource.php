<?php

/**
 *  section digunakan untuk include components di folder
 *  public/views/**
 */
function section(string $filename)
{
  require "./public/" . $filename . ".php";
}

/**
 *  asset berfungsi untuk mengarahkan file css / js
 *  public/**
 */
function asset(string $filename)
{
  echo "./public/" . $filename;
}
