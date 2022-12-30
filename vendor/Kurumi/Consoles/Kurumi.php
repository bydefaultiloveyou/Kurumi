<?php

namespace Kurumi\Consoles;

class Kurumi
{
  /**
   * @var string $argv    berisi argumen dari konsol.
   */
  private $argv;

  /**
   * @var array  $options berisi argumen dari konsol (berbentuk array).
   */
  private $options;

  /**
   * @var string $short_options  pilihan argumen yang tersedia
   * @var array  $long_options   ______________ ,, _____________
   */
  private $short_options = 'c:m:';
  private $long_options = [
    'make::Model:',
    'make::Controller:',
  ];

  public function __construct()
  {
    /**
     * mengisi properti $argv dengan argumen dari konsol
     */
    global $argv;
    $this->argv = $argv;
    $this->options = getopt($this->short_options, $this->long_options);

    /**
     * hentikan program bila tidak ada argumen yang diberikan
     */
    if ($this->options === [] and @!$this->argv[1]) {
      $this->handleError();
    }

    /**
     * membuat controller bila terdapat argumen -c atau --make::Controller
     */
    if (isset($this->options['c']) or isset($this->options['make::Controller'])) {
      $controller = isset($this->options['c']) ?
        $this->options['c'] : $this->options['make::Controller'];
      $this->createController(ucfirst($controller));
    }

    /**
     * membuat model bila terdapat argumen -m atau --make::Model
     */
    if (isset($this->options['m']) or isset($this->options['make::Model'])) {
      $model = isset($this->options['m']) ?
        $this->options['m'] : $this->options['make::Model'];
      $this->createModel(ucfirst($model));
    }

    /**
     * menjalankan server
     */
    if (@$this->argv[1] === 'server') {
      $this->server();
    }
  }


  /**
   *  memunculkan pesan bila tidak ada argumen yang diberikan
   *  @return void
   */
  public function handleError(): void
  {
    echo "
Welcome to Kurumi Framework

Mini Framework for PHP Native, project open source!!
Lets contribute https://github.com/bydefaultiloveyou/Kurumi.git

If you get this output on your input, that mean your command wrong
please check in bottom for your input

======================== kurumi command list ========================

--make::Controller <NameController>    membuat controller handler
  | -c <NameController>                sama seperti --make::Controller
";
  }


  /**
   * jalankan server sambil memberikan kata-kata mutiara :v
   * @return string
   */
  public function randQuotes(): string
  {
    $quotes = [
      #"sebodoh bodohnya kamu \n  jangan pernah nyoba programming.",
      "jika mereka menolak untuk menerima mu \nmaka aku akan menerimamu apa adanya!.\n",
      "apapun yang kamu lalukan pastikan \nitu membuat kamu bahagia.\n",
      "untuk mencapai tujuan kita \nkita harus mengejarnya sendiri.\n",
      "aku ingin memiliki kenangan bersama mu \ndan juga aku ingin kau juga memiliki kenangan bersamaku.\n"
    ];

    return $quotes[array_rand($quotes)];
  }


  /**
   * membuat controller dengan nama yang diberikan di konsol
   * @param  string $controller_name
   * @return void
   */
  public function createController(string $controller_name): void
  {
    if (file_exists("./app/Controllers/$controller_name.php")) {
      echo "\ncontroller `$controller_name` sudah ada!\n";
      die;
    }

    try {
      $newFile = fopen("./app/Controllers/$controller_name.php", 'w');
      $string  = "<?php

namespace App\Controllers;

/**
 * Disini kamu bisa mengatur logika dan operasi
 * yang dijalankan sesuai dengan route yang sudah dibuat.
 */
class $controller_name
{
  // write method in here
}";
      fwrite($newFile, $string);
      fclose($newFile);
      echo "\ncontroller `$controller_name` berhasil dibuat!\n";

    } catch (\Throwable $th) {
      $last_trace = $th->getTrace()[0];

      echo "
gagal membuat controller!

{$th->getMessage()}

{$last_trace['file']}
from `{$last_trace['function']}` in line: {$last_trace['line']}";
    }
  }


  /**
   * membuat model (sekaligus tabel) dengan nama yang diberikan di konsol
   * @param  string $model_name
   * @return void
   */
  public function createModel(string $model_name): void
  {
    if (file_exists("./app/Models/$model_name.php")) {
      echo "\nmodel `$model_name` sudah ada!\n";
      die;
    }

    try {
      // test;  // matikan komentar untuk tes pesan error
      $newFile = fopen("./app/Models/$model_name.php", 'w');

      // memaksa nama tabel berbentuk jamak
      /*match (true) {
        // ex: studies, properties, flies, skies
        preg_match('/y$/', $model_name) => preg_replace('/y$/', 'ies', $model_name),
        // ex: classes, glasses, potatoes, mangoes
        preg_match('/[o|ss]$/', $model_name) => $model_name .= 'es',
        // ex: books, users, players, students
        default => $model_name .= 's',
      };*/
      $table_name = strtolower($model_name) . 's';
      $string  = "<?php

namespace App\Models;
use Kurumi\Database\Database;


/**
 * Disini kamu bisa menuliskan logika dan operasi
 * yang biasa dilakukan pada database (misalnya query).
 */
class $model_name
{
  public static function DB()
  {
    return new Database('{$table_name}');
  }
}";
      fwrite($newFile, $string);
      fclose($newFile);
      echo "\nmodel `$model_name` berhasil dibuat!\n";

    } catch (\Throwable $th) {
      $last_trace = $th->getTrace()[0];

      echo "
gagal membuat model!

{$th->getMessage()}

{$last_trace['file']}
from `{$last_trace['function']}` in line: {$last_trace['line']}";
    }
  }


  public function server()
  {
    echo "
Kurumi server is running:

\033[0;32m local: http://localhost:3000/
\033[0;32m ip: http://127.0.0.1:3000/
\033[0;0m

Tokisaki Kurumi:
{$this->randQuotes()}";

    if (PHP_OS === 'Linux') {
      exec('cd public/ && php -S localhost:3000 > /dev/null 2>&1');
    } else {
      exec('cd public/ && php -S localhost:3000 > NUL');
    }
  }
}
