<?php

namespace Database\Migrations;

class TestMigration
{
    public function up()
    {
        (new \Rasiel\Connect('tests'))->createTable(function ($query) {
            $query->id();
            $query->string('name')
                ->notNull()
                ->default('miko')
                ->end();
            $query->boolean('done')
                ->default(false)
                ->unique()
                ->end();

            // jangan hapus code ini
            $query->create();
        });
    }
}
