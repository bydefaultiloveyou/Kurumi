<?php

namespace Kurumi\Consoles;

class Kurumi
{
    /**
     * @var string $argv    berisi argumen dari konsol.
     */
    private $argv;

    public function __construct()
    {
        /**
         * mengisi properti $argv dengan argumen dari konsol
         */
        global $argv;
        $this->argv = $argv;

        /**
         * hentikan program bila tidak ada argumen yang diberikan
         */
        if (!isset($this->argv[1]) or $this->argv[1] === "help") {
            $this->handleError();
        }

        /**
         * membuat file controller
         */
        if (@$this->argv[1] === "make:controller" or @$this->argv[1] === "-c") {
            $this->createController(@$this->argv[2]);
        }

        /*
        * membuat file migration
        */
        if (@$this->argv[1] === "make:migrate") {
            $this->createMigrate(@$this->argv[2]);
        }

        /**
         * membuat file model
         */
        if (@$this->argv[1] === "make:model" or @$this->argv[1] === "-m") {
            $this->createModel(@$this->argv[2]);
        }

        /**
         * menjalankan server
         */
        if (@$this->argv[1] === 'server') {
            $portserve = @$this->argv[2] !== null && (@$this->argv[2] === '-p') ? @$this->argv[3] : 3000;
            $this->server($portserve);
        }

        /**
         * menjalankan migration
         */
        if (@$this->argv[1] === 'migrate') {
            system("php ./vendor/rasiel/Migration/Migrate.php");
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

======================== kurumi command list ========================

\033[0;32m server                                      \033[0;0m Jalanin Server

\033[0;32m server -p <custom port>                     \033[0;0m Jalanin server dengan custom port

\033[0;32m make:controller <NameController>            \033[0;0m membuat controller handler

\033[0;32m make:model <NameModel>                      \033[0;0m membuat model

\033[0;32m make:migration <NameController>             \033[0;0m membuat migration
";
    }

    /**
     * jalankan server sambil memberikan kata-kata mutiara :v
     * @return string
     */
    public function randQuotes(): string
    {
        $quotes = [
            "jika mereka menolak untuk menerima mu \nmaka aku akan menerimamu apa adanya!.\n",
            "apapun yang kamu lalukan pastikan \nitu membuat kamu bahagia.\n",
            "untuk mencapai tujuan kita \nkita harus mengejarnya sendiri.\n",
            "aku ingin memiliki kenangan bersama mu \ndan juga aku ingin kau juga memiliki kenangan bersamaku.\n"
        ];

        return $quotes[array_rand($quotes)];
    }

    public function createMigrate(string $migrate_name): void
    {

        if (file_exists("./database/Migrations/$migrate_name.php")) {
            echo "\nMigrations `$migrate_name` sudah ada!\n";
            die;
        }

        try {
            $newFile = fopen("./database/Migrations/$migrate_name.php", 'w');
            $table_name =  str_replace('Migration', '', $migrate_name);
            $table_name = strtolower($table_name . "s");
            $string  = '<?php

namespace Database\Migrations;

class ' . $migrate_name . '
{
    public function up()
    {
        (new \Rasiel\Connect(' . "'" . $table_name . "'" . '))->createTable(function ($query) {

            // jangan hapus code ini
            $query->create();
        });
    }
}
      ';
            fwrite($newFile, $string);
            fclose($newFile);
            echo "\nMigration `$migrate_name` berhasil dibuat!\n";
        } catch (\Throwable $th) {
            $last_trace = $th->getTrace()[0];

            echo "
gagal membuat Migrate!

{$th->getMessage()}

{$last_trace['file']}
from `{$last_trace['function']}` in line: {$last_trace['line']}";
        }
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
            // matikan komentar untuk tes pesan error
            $newFile = fopen("./app/Models/$model_name.php", 'w');

            // memaksa nama tabel berbentuk jamak
            $table_name = strtolower($model_name) . 's';
            $string  = "<?php

namespace App\Models;

/**
 * Disini kamu bisa menuliskan logika dan operasi
 * yang biasa dilakukan pada database (misalnya query).
 */
class $model_name
{
  public static function Rasiel()
  {
    return new \Rasiel\Connect('{$table_name}');
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


    public function server($port)
    {
        echo "
Kurumi server is running:

\033[0;32m local: http://localhost:{$port}/
\033[0;32m ip: http://127.0.0.1:{$port}/
\033[0;0m

Tokisaki Kurumi:
{$this->randQuotes()}";

        $commandExec = "cd public/ && php -S localhost:{$port}";

        exec($commandExec);
    }
}
