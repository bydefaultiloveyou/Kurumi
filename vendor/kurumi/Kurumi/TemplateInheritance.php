<?php

namespace Kurumi\Kurumi;

/*
|--------------------------------------------------------------------------
| TemplateInheritance 
|--------------------------------------------------------------------------
| 
| sebuah fitur untuk mengatur template layouts kamu 
| 
|
 */

class TemplateInheritance
{

  /**
   *
   *  @template -> berisi nama file dari @extendContent
   *
   */

  protected $template;

  /**
   *
   *  @layout -> berisi nama layout dari @startContent
   *
   */

  protected $layout;

  /**
   *
   *  @key -> berisi key nama layout dari @startContent
   *       -> property ini khusus untuk membuat key buffer 
   *
   */

  protected $key;

  /**
   *
   *  @buffer -> berisi buffer dari @stopSection
   *
   */

  protected $buffer;

  /**
   *
   *  @deusContent -> method untuk mengirim nama layouts  
   *                  ke property $layout
   *  @layout string 
   *
   */

  public function deusContent(string $layout)
  {
    if (array_key_exists($layout, $this->layout)) {
      if ($this->layout[$layout] === $layout) {
        echo $this->buffer[$layout];
      }
    }
  }

  /**
   *
   *  @extendContent -> method untuk mengirim nama filetemplate 
   *                    ke property $template 
   *  @template string 
   *
   */

  public function extendContent(string $template)
  {
    $this->template = $template;
    $this->render();
  }

  /**
   *
   *  @startContent -> method untuk memulai buffer dan mengirim 
   *                   nama layout ke property @layout
   *                   dan mengirim key ke property @key
   *  @layout array 
   *
   */

  public function startContent(string $layout)
  {
    $this->layout[$layout] = $layout;
    $this->key = $layout;
    return ob_start();
  }

  /**
   *
   *  @stopSection -> method untuk menutup buffer dan 
   *                  mengirim kan buffer ke property buffer 
   *
   */

  public function stopContent()
  {
    $this->buffer[$this->key] = ob_get_clean();
  }

  /**
   *
   *  @render -> method untuk merender layout 
   *
   */

  public function render()
  {
    $path = __DIR__ . PATH_VIEW_STORAGE . $this->template . '.kurumi.php';
    include $path;
  }
}
