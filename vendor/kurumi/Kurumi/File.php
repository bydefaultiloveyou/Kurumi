<?php

namespace Kurumi\Kurumi;
use Kurumi\Kurumi\Haniel;

/**
 * Class untuk mengelola file dan directive
 */
class File {
  /**
   * @var array $input_files  # berisi nama-nama file dari folder input
   * @var array $output_files # berisi nama-nama file dari folder output
   */
  private array $input_files  = [];
  private array $output_files = [];

  /**
   * @var $input_directory  # nama folder input
   * @var $output_directory # nama folder output
   */
  private $input_directory  = __DIR__ . '/../../../resources/views/';
  private $output_directory = __DIR__ . '/../../../storage/framework/views/';


  /**
   * Mengambil semua file di folder input dan output.
   * Memperbarui file view (sterilize & generate).
   */
  public function __construct() {
    $this->input_files = array_merge(
      glob("{$this->input_directory}*.kurumi.php"),
      glob("{$this->input_directory}**/*.kurumi.php"),
      glob("{$this->input_directory}**/**/*.kurumi.php"),
      glob("{$this->input_directory}**/**/**/*.kurumi.php"),
    );
    $this->output_files = glob("{$this->output_directory}*.php");

    $this->sterilize();
    $this->generate();
  }


  /**
   * Menyesuaikan file input dan output
   * -> ambil nama file yang berakhiran '.kurumi.php'     # (str_replace)
   * -> cek adakah file input                             # (file_exists)
   * -> hapus file output bila tidak ada di folder input  # (unlink)
   * @return void
   */
  public function sterilize(): void {
    foreach ($this->output_files as $file) {
      $base_name = str_replace('.kurumi.php', '', basename($file));
      
      $output_dir = $this->output_directory . $base_name;
      $input_dir  = $this->input_directory . str_replace('.', '/', $base_name);

      if (!file_exists("$input_dir.kurumi.php")) {
        unlink("$output_dir.kurumi.php");
      }
    }
  }


  /**
   * Method untuk membuat file baru dengan
   * directive yang telah diubah menjadi kode php oleh Haniel.
   * -> ambil nama file tanpa direktorinya
   * -> ubah simbol / menjadi .     # (str_replace)
   * -> ambil isi file              # (file_get_contents)
   * -> buat file di folder output  # (fopen, fwrite, fclose)
   * @return void
   */
  public function generate(): void {
    foreach ($this->input_files as $file) {
      $filename = str_replace($this->input_directory, '', $file);
      $filename = str_replace('/', '.', $filename);

      $contents = file_get_contents($file);

      $file_new = fopen($this->output_directory . $filename, 'w');
      fwrite($file_new, Haniel::transform($contents));
      fclose($file_new);
    }
  }
}
