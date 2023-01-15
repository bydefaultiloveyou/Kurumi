<?php

namespace Kurumi\Kurumi;

use Exception;

/*
|--------------------------------------------------------------------------
| Component
|--------------------------------------------------------------------------
| 
| 
| 
|
 */

class Component
{

  /**
   *
   *  @component string -> name component to the @extendContent
   *    
   */
  protected $component;

  /**
   *
   *  @data -> method khusus untuk menangani data 
   *
   */
  protected $data;

  /**
   *
   *  @extendContent string -> method untuk mengirimkan name component
   *                           ke @component
   *  @component string 
   *
   */
  public function extendContent(string $component, $data = [])
  {
    $this->component = $component;
    $this->data = $data;
    $this->render();
  }

  /**
   *
   *  @render -> method untuk merender @component ( name_compoent )
   *
   *
   */

  public function render()
  {
    foreach ($this->data as $key => $value) {
      $$key = $value;
    }

    $path = __DIR__ . PATH_VIEW_STORAGE . "components." . trim($this->component) . ".kurumi.php";
    if (file_exists($path)) {
      include $path;
    } else {
      throw new Exception("component `<" . trim($this->component) . "/> tidak ditemukan!");
    }
  }
}
