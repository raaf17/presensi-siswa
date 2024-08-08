<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'app_title' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'app_email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'app_phone' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'app_meta_keyword' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'app_meta_description' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'app_logo' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'app_favicon' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true,
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
