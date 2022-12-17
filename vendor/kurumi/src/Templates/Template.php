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
    //  syntax php echo 
    // add htmlspecialchars
    $contents = preg_replace('/\{{ (.*) \}}/', '<?php echo htmlspecialchars($1) ?>', $contents);
    $contents = preg_replace('/(.*) \{{/', '<?php echo htmlspecialchars($1', $contents);
    $contents = preg_replace('/(.*) \}}/', '$1) ?>', $contents);
    // no htmlspecialchars
    $contents = preg_replace('/\{! (.*) \!}/', '<?php echo $1 ?>', $contents);
    $contents = preg_replace('/(.*) \{!/', '<?php echo $1', $contents);
    $contents = preg_replace('/(.*) \!}/', '$1 ?>', $contents);
    // syntax php no echo 
    $contents = preg_replace('/\{ (.*) \}/', '<?php $1 ?>', $contents);
    $contents = preg_replace('/(.*) \{/', '<?php $1', $contents);
    $contents = preg_replace('/(.*) \}/', '$1 ?>', $contents);
    // default variable data 
    $contents = preg_replace('/\!(.*)\!/', '$data["$1"]', $contents);
    // syntax if else 
    $contents = preg_replace('/\@if (.*) \:/', '<?php if ($1): ?>', $contents);
    $contents = preg_replace('/@elif (.*) \:/', '<?php elseif ($1): ?>', $contents);
    $contents = preg_replace('/\@else/', '<?php else: ?>', $contents);
    $contents = preg_replace('/@endif/', '<?php endif; ?>', $contents);
    // syntax for each
    $contents = preg_replace('/\@foreach (.*) \:/', '<?php foreach($1 $2): ?>', $contents);
    $contents = preg_replace('/@endforeach/', '<?php endforeach; ?>', $contents);
    // view include 
    $contents = preg_replace('/\@include (.*)/', '<?php include __DIR__ . "/" . $1 . ".kurumi.php" ?>', $contents);
    // view yield 
    $contents = preg_replace('/\@slot(.*)/', '<?php include $slot ?>', $contents);
    // view asset 
    $contents = preg_replace('/\@asset (.*)\;/', '<?php echo "./public/" . $1 ?>', $contents);

    return $contents;
  }

  private function generate()
  {
    // mengambil semua file pada folder resources/view
    $files = array_merge(glob('./resources/views/*php'), glob('./resources/views/**/*php'), glob('./resources/views/**/**/*php'), glob('./resources/views/**/**/**/*php'), glob('./resources/views/**/**/**/**/*php'), glob('./resources/views/**/*php'));
    // kita loop setiap filenya
    foreach ($files as $file) {

      $filename = str_replace('./resources/views/', "", $file); // yang udah di pisah
      $filename = str_replace("/", ".", $filename);

      $contents = file_get_contents($file);
      $file_new = fopen(__DIR__ . '/../../../../storage/framework/views/' . $filename, 'w');
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
