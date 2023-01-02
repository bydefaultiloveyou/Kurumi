<?php

namespace Database\Migrations;

class UserMigration
{
    public function up()
    {
        (new \Rasiel\Connect('users'))->createTable(function ($field) {

            $field->id();
            $field->string('username', 100)
                ->unique()
                ->notNull()
                ->end();
            $field->string('email', 100)
                ->unique()
                ->notNull()
                ->end();
            $field->string('password')
                ->notNull()
                ->end();
            $field->boolean('isAdmin')
                ->default(false)
                ->end();

            // jangan hapus code ini
            $field->create();
        });
    }
}
