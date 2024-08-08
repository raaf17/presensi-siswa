<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'id_siswa' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'status' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20'
            ],
            'role' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20'
            ],
            'foto' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
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
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users', 'users_id_siswa_foreign');
        $this->forge->dropTable('users');
    }
}
