<?php

namespace Kurumi\Kurumi;

/** ---------------
 *  new Regex
 *  adalah sebuah class yang di gunakan untuk membuat template engine
 *  
 *  !! Warning
 *  Jika kalian sering mual karena suatu yang rumit tidak di anjurkan untuk kesini
 */

class Regex
{
  protected function run($contents)
  {
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
    $contents = preg_replace('/\@each (.*) \:/', '<?php foreach($1 $2): ?>', $contents);
    $contents = preg_replace('/@endeach/', '<?php endforeach; ?>', $contents);
    // view include 
    $contents = preg_replace('/\@include (.*)/', '<?php require __DIR__ . "/" . $1 . ".kurumi.php" ?>', $contents);
    // asset
    $contents = preg_replace('/\@asset (.*)\:/', '<?php echo $1 ?>', $contents);
    // view yield 
    $contents = preg_replace('/\@slot(.*)/', '<?php include $slot ?>', $contents);
    // method
    $contents = preg_replace('/\@method (.*)/', '<input type="hidden" name="_method" value=$1 />', $contents);

    return $contents;
  }
}
