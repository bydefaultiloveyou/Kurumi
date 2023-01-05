<?php


/*
|--------------------------------------------------------------------------
| Database Config 
|--------------------------------------------------------------------------
|
| Konfigurasi database
|
 */

// memuat file konfigurasi utama `.env`
$config_list = parse_ini_file(__DIR__ . '/../.env');

return [
  /** 
   * host [default = 'localhost']
   * nama host dari server database yang digunakan
   */
  'host' =>  $config_list['DATABASE_HOST'] ?? 'localhost',

  /** 
   * database [default = 'kurumi']
   * nama database yang digunakan
   */
  'database' => $config_list['DATABASE_NAME'] ?? 'kurumi',

  /** 
   * user [default = 'root']
   * username dari server database yang digunakan
   */
  'user' => $config_list['DATABASE_USER'] ?? 'root',

  /**
   * password [default = '']
   * password dari server database yang digunakan
   */
  'password' => $config_list['DATABASE_PASSWORD'],

  /** 
   * dialect [default = mysql]
   * jenis dbms yang digunakan
   */
  'dialect' => $config_list['DIALECT'] ?? 'mysql',
];
