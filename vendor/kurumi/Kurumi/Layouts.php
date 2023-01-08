<?php

namespace Kurumi\Kurumi;

/*
|--------------------------------------------------------------------------
| Layouts Class 
|--------------------------------------------------------------------------
| 
| class untuk mengatur Layouts
| 
| 
|
*/

class Layouts
{
  /**
   *
   * @foreach -> looping data dan jadikan variabel biasa
   *
   */

  public function __construct(string $filename, array $data = [])
  {
    foreach ($data as $key => $value) {
      eval('$$key = $value;');
    }

    $__deus = new \Kurumi\Kurumi\TemplateInheritance;
    $__comp = new \Kurumi\Kurumi\Component;
    include __DIR__ . PATH_VIEW_STORAGE . $filename . '.kurumi.php';
  }
}
