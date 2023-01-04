<?php

namespace Kurumi\Kurumi;

/*
|--------------------------------------------------------------------------
| Deus Class 
|--------------------------------------------------------------------------
| 
| @deus adalah sebuah class untuk menangani layouting engine bagian 
| layout
|
*/


class Deus
{


  /**
   *
   * @files -> array 
   *        -> berisikan path file dari __construct
   */

  protected $files;

  /**
   *
   * @name -> string 
   *       -> berisi value dari @deusContent
   */

  protected $name;

  /**
   *
   * @matches -> array  
   *          -> berisi value dari @takeContent
   */

  protected $matches;


  public function __construct()
  {
    $files = array_merge(
      glob(__DIR__ . "/../../../resources/views/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/**/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/**/**/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/**/**/**/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/**/**/**/**/*.php"),
      glob(__DIR__ . "/../../../resources/views/**/**/**/**/**/**/*.php"),
    );

    $this->files = $files;
  }


  /**
   *
   * @deusContent -> untuk mendapatkan value/name dari @deus
   * @name -> string 
   *
   */

  public function deusContent(string $name): void
  {
    $this->name = $name;
    $this->takeContent();
  }

  /**
   *
   * @takeContent -> method untuk mengambil value dari @section
   *                 dan @endsection yang ada di dalam nya 
   *              -> [ @section  value  @endsection ]
   *  
   */

  protected function takeContent(): void
  {
    foreach ($this->files as $result) {
      $content = file_get_contents($result);
      $content = preg_match_all('/@section\s*\(([^)]*)\)\s*\n(.*?)\n\s*@endsection/s', $content, $matches);

      if ($content === 0) {
        break;
      }

      $matche = explode('"', $matches[1][0]);
      if ($matche[1] === $this->name) {
        $replace = preg_replace("/@section\s*\(.*\)\s*\n*|\n*@endsection/s", '',  $matches[0][0]);
        echo $replace;
      }
    }
  }
}
