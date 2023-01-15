<?php

namespace Kurumi\Kurumi;

/*
|--------------------------------------------------------------------------
| Layouts Class 
|--------------------------------------------------------------------------
|
| Haniel adalah nama angel milik Natsumi yang dapat merubah 
| wujud benda apapun. Dia dapat merubah directive pada template 
| html kamu menjadi kode php.
|
| directive yang tersedia:
|  -> {{ 'hello' }}            ==> <?php echo htmlspecialchars('hello') ?>
|  -> {! 'hello' !}            ==> <?php echo 'hello' ?>
|  -> { $var = 123 }           ==> <?php $var = 123 ?>
|  -> @if (true):              ==> <?php if (true): ?>
|  -> @elif (true):            ==> <?php elseif (true): ?>
|  -> @else:                   ==> <?php else: ?>
|  -> @endif                   ==> <?php endif; ?>
|  -> @each ($items as $i):    ==> <?php foreach ($items as $i): ?>
|  -> @endeach                 ==> <?php endforeach; ?>
|  -> @include ('home')        ==> <?php require __DIR__ . '/home.kurumi.php' ?>
|  -> @asset ('style.css')     ==> <?php echo 'style.css' ?>
|  -> @slot                    ==> <?php include $slot ?>
|  -> @method ("put")          ==> <input type="hidden" name="_method" value="put" />
|  -> @css ("index.css")       ==> <link href="index.css" rel="stylesheet" />
|  -> @javascript ("main.js")  ==> <script src="main.js"></script>
*/

class Haniel
{
  private static string $contents;

  private static function _parse($pattern, $replace, bool $isPHP = TRUE): void
  {
    if ($isPHP) {
      $replace = "<?php $replace ?>\n";
    }

    self::$contents = preg_replace($pattern, $replace, self::$contents);
  }

  public static function transform(string $contents): string
  {
    self::$contents = $contents;

    self::_parse('/\{{([\s\S]*?)\}}/', 'echo htmlspecialchars($1)');
    self::_parse('/\{!([\s\S]*?)\!}/', 'echo $1');
    self::_parse('/\{([\s\S]*?)\}/', '$1');
    self::_parse('/@if\s*\((.*)\)\s*:\s*/', 'if ($1):');
    self::_parse('/@elif\s*\((.*)\)\s*:\s*/', 'elseif ($1):');
    self::_parse('/\@else\s*:\s*/', 'else:');
    self::_parse('/@endif/', 'endif;');
    self::_parse('/@each\s*\((.*)\)\s*:\s*/', 'foreach($1):');
    self::_parse('/@endeach/', 'endforeach;');
    self::_parse('/@include\s*\((.*)\)\s*/', 'require __DIR__ . "/" . $1 . ".kurumi.php"');
    self::_parse('/\@asset\s*\((.*)\)\s*/', 'echo $1');
    self::_parse('/@slot(.*)/', 'include $slot');
    self::_parse('/@method\s*\((.*)\)\s*/', '<input type="hidden" name="_method" value=$1 />', FALSE);
    self::_parse('/@css\s*\((.*)\)\s*/', '<link href=$1 rel="stylesheet" />', FALSE);
    self::_parse('/@javascript\s*\((.*)\)\s*/', '<script src=$1></script>', FALSE);
    self::_parse('/@deus\s*\((.*)\)\s*/', '$this->deusContent($1)');
    self::_parse('/@extends\s*\((.*)\)\s*/', '$__deus->extendContent($1)');
    self::_parse('/@section\s*\((.*)\)\s*/', '$__deus->startContent($1)');
    self::_parse('/@endsection/', '$__deus->stopContent()');
    self::_parse('/@component\s*\((.*)\)\s*/', '$this->slot($1)');
    // self::_parse('/<x-(.*?)\s*(data=(.*?))?\s*\/>/', '$__comp->extendContent("$1",$3)');

    self::$contents = preg_replace_callback('/\s*<x-(.*)\s*\/>/', function($m){
      $matches = trim($m[1]);
      $matches = explode(' ', $matches);
      $name = $matches[0];
      unset($matches[0]);

      $data = [];
      foreach ($matches as $match) {
        if (preg_match('/x-(.*)/', $match)) {
          $match = str_replace('x-', '', $match);
          $match = preg_replace('/(.*)="(.*)"/', '"$1"=>"$2"', $match);
          array_push($data, $match);
        }
      }

      $data = implode(', ', $data);
      $result = "\n<?php \$__comp->extendContent(\"$name\", [$data]) ?>\n";
      return $result;
      
    }, self::$contents);

    return self::$contents;
  }
}
