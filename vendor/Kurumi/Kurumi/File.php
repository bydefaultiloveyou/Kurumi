<?php

namespace Kurumi\Kurumi;
use Kurumi\Kurumi\TemplateEngine;

/**
 * Class untuk mengelola file dan directive
 */
class File
{
  /**
   * @var array $files # berisi nama-nama file dari folder input
   */
  private array $files = [];

  /**
   * @var $input_directory  # nama folder input
   * @var $output_directory # nama folder output
   */
  private $input_directory = __DIR__ . '/../../../resources/views/';
  private $output_directory = __DIR__ . '/../../../storage/framework/views/';


  public function __construct()
  {
    $this->files = array_merge(
      glob("{$this->input_directory}*.kurumi.php"),
      glob("{$this->input_directory}**/*.kurumi.php"),
      glob("{$this->input_directory}**/**/*.kurumi.php"),
      glob("{$this->input_directory}**/**/**/*.kurumi.php"),
    );

    $this->sterilize();
    $this->generate();
  }


  /**
   * menyesuaikan file input dan output
   * (hapus file output bila tidak ada di folder input)
   * @return void
   */
  public function sterilize(): void
  {
    // ambil nama file di folder storage/framework/views
    $files = glob($this->output_directory . '*.kurumi.php');

    foreach ($this->files as $file)
    {
      // ambil nama file yang berakhiran '.kurumi.php'
      $base_name = basename($file, '.kurumi.php');

      // ubah simbol . menjadi /
      $base_name = str_replace('.', '/', $base_name);

      // hapus file output bila tidak ada di folder input
      if (!file_exists("{$this->input_directory}{$base_name}.kurumi.php"))
      {
        unlink("{$this->output_directory}{$base_name}.kurumi.php");
      }
    }
  }

  public function generate()
  {
    foreach ($this->files as $file)
    {

      // ambil nama file tanpa direktorinya
      $filename = str_replace($this->input_directory, '', $file);

      // ubah simbol / menjadi .
      $filename = str_replace("/", ".", $filename);

      // ambil isi file
      $contents = file_get_contents($file);

      // buat file di folder output
      $file_new = fopen($this->output_directory . $filename, 'w');
      fwrite($file_new, TemplateEngine::parse($contents));
      fclose($file_new);
    }
  }
}
