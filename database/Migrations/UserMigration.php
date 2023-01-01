<?php

namespace Database\Migrations;

class UserMigration
{
    public function up()
    {
        (new \Rasiel\Connect('users'))->createTable(function ($query) {
            $query->id();
            $query->string('username', 100)->unique()->end();
            $query->string('email', 100)->unique()->end();

            // jangan hapus code ini
            $query->create();
        });
    }
}
