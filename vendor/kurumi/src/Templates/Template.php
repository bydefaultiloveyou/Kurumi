<?php


namespace Kurumi\Templates;

class Template
{
  protected $path;
  protected $data;
  protected $file_name;

  public function __construct($path, $data)
  {
    $this->path = $path . '.kurumi.php';
    $this->data = $data;  // home.php
    $this->syntax();
  }

  private function regex($contents)
  {
    $contents = preg_replace('/\{{ (.*) \}}/', '<?= $1 ?>', $contents);
    $contents = preg_replace('/\{ (.*) \}/', '<?php $1 ?>', $contents);
    $contents = preg_replace('/^@if(.*)/m', '<?php if($1): ?>', $contents);
    $contents = preg_replace('/@elseif(.*)/m', '<?php elseif($1): ?>', $contents);
    $contents = preg_replace('/@else(.*)/m', '<?php else: ?>', $contents);
    $contents = preg_replace('/@endif/m', '<?php endif; ?>', $contents);
    return $contents;
  }

  private function generate()
  {
    $files = array_merge(glob('./resources/views/*php'), glob('./resources/views/components/*php'));
    foreach ($files as $file) {
      $contents = file_get_contents($file);
      $file_new = fopen(__DIR__ . '/../../../../storage/framework/views/' . basename($file), 'w');
      fwrite($file_new, $this->regex($contents));
      fclose($file_new);
    }
  }

  private function syntax()
  {
    $data = $this->data;
    $this->generate();
  }
}
