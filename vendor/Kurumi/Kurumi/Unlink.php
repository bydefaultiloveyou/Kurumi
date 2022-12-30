<?php

namespace Kurumi\Kurumi;

class Unlink
{
    public function remove()
    {

        // global dir on storage/framework/views
        $dir = __DIR__ . "/../../../storage/framework/views/";


        // ambil nama file di folder storage/framework/views
        $files = glob($dir . "*.php");


        // looping semua file
        foreach ($files as $file) {


            // ambil main nama dari file
            $basename = str_replace('.', '/', basename(str_replace('.kurumi.php', '', $file)));


            // hapus full folder dari nama file
            $filename = str_replace($dir, '', $file);


            // check jika file di resources/views tidak ada maka hapus file itu di storage/framework/push
            if (!file_exists(__DIR__ . '/../../../resources/views/' . $basename . '.kurumi.php')) {

                // hapus file
                unlink($dir . $filename);
            }
        }
    }
}
