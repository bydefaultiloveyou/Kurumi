<?php

namespace Kurumi\Variable;

class define
{
  public function __construct()
  {
    /**
     *
     *  to storage/view 
     *
     */
    define("PATH_VIEW_STORAGE", '/../../../storage/framework/views/');

    /**
     *
     *  to storage/view 
     *
     */
    define("PATH_VIEW_RESOURCES", '/../../../resources/views/');

    /**
     *
     *  to config/database 
     *
     */
    define("PATH_CONFIG_DATABASE", '/../../../config/database.php');
  }
}
