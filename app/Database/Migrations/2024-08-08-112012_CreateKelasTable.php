<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKelasTable extends Migration
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
            'id_jurusan' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'id_guru' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'nama_kelas' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'keterangan' => [
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
        $this->forge->addForeignKey('id_jurusan', 'jurusan', 'id');
        $this->forge->addForeignKey('id_guru', 'guru', 'id');
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropForeignKey('kelas', 'kelas_id_jurusan_foreign');
        $this->forge->dropForeignKey('kelas', 'kelas_id_guru_foreign');
        $this->forge->dropTable('kelas');
    }
}
