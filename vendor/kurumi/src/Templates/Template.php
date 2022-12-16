<?php


namespace Kurumi\Templates;

class Template
{
  protected $path,
    $file_name;

  public function __construct($path, $file_name)
  {
    $this->path = $path . '.kurumi.php';
    $this->file_name = $file_name;
    $this->syntax();
  }

  public function syntax()
  {
    $contents = file_get_contents($this->path);
    $contents = preg_replace('/\{{ (.*) \}}/', '<?= $1 ?>', $contents);
    $file_new = fopen(__DIR__ . '/../../../../storage/framework/views/' . $this->file_name . '.kurumi.php', 'w');
    fwrite($file_new, $contents);
    fclose($file_new);
  }
}
