<?php

/* 
|--------------------------------------------------------------------------
| Database config 
|--------------------------------------------------------------------------
| 
|
|
|
|
 */



return [

  /** 
   * @host
   * ini adalah tempat kalian untuk mementukan host dari database
   * default localhost
   */

  "host" =>  parse_ini_file('./../.env')["DATABASE_HOST"] ?? "localhost",

  /** 
   * @database
   * ini adalah nama dari database kalian
   * default kurumi
   */
  "database" => parse_ini_file('./../.env')["DATABASE_NAME"] ?? "kurumi",

  /** 
   * @user
   * user login dari dbms kalian default root
   */

  "user" => parse_ini_file('./../.env')["DATABASE_USER"] ?? "root",

  /**
   * @password
   * password login dari dbms kalian
   * default null
   */

  "password" => parse_ini_file('./../.env')["DATABASE_PASSWORD"],

  /** 
   * @dialect
   * jenis dbms yang kalian pakai
   */

  "dialect" => parse_ini_file('./../.env')["DIALECT"] ?? "mysql",
];
