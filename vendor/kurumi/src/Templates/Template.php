<?php


namespace Kurumi\Templates;

class Template
{
  protected $path;
  protected $data;

  public function __construct($path, $data)
  {
    $this->path = $path . '.kurumi.php';
    $this->data = $data;
    $this->syntax();
  }

  public function syntax()
  {
    $data = $this->data;
    $contents = file_get_contents($this->path);
    $contents = preg_replace('/\{{ (.*) \}}/', '<?= $1 ?>', $contents);
    $file_new = fopen(__DIR__ . '/contoh/example.php', 'w');
    fwrite($file_new, $contents);
    fclose($file_new);
  }
}
