<?php

namespace Kurumi\Templates;

use Kurumi\Templates\Kurumi;

class Layouts extends Kurumi
{
  protected $filename;

  public function __construct($filename, $data, $config_view)
  {
    $this->filename = $filename;
    $this->render($data);
    $this->syntax($filename, $data, $config_view);
  }

  public function render($data)
  {
    $config_layout = require_once __DIR__ . '/../../../../config/layout.php';

    $kurumi = new Kurumi();


    if ($config_layout['enable']) {

      include $this->path($config_layout['path']);
    } else {

      include $this->path($this->filename);
    }
  }

  public function syntax($filename, $data, $config_view)
  {
    $path = __DIR__ . '/../../../../resources/' . $config_view . '/' . $filename . '.kurumi.php';
    $contents = file_get_contents($path);
    $contents = preg_replace('/\{{ (.*) \}}/', '<?= $1 ?>', $contents);
    $contents = preg_replace('/(.*) \{{/', '<?= $1', $contents);
    $contents = preg_replace('/(.*) \}}/', '$1 ?>', $contents);
    $contents = preg_replace('/(.*) \{/', '<?php $1', $contents);
    $contents = preg_replace('/(.*) \}/', '$1 ?>', $contents);
    $contents = preg_replace('/\ @if (.*) \:/', 'if ($1) :', $contents);
    $contents = preg_replace('/\ @elif (.*) \:/', 'elseif ($1) :', $contents);
    $contents = preg_replace('/\ @else \:/', 'else :', $contents);
    $contents = preg_replace('/\ @endif /', 'endif', $contents);
    eval('?>' . $contents . '<?php');
  }
}
