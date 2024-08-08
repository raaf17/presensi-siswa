<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKetidakhadiranTable extends Migration
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
            'keterangan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'tanggal' => [
                'type'              => 'DATE',
            ],
            'deskripsi' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'file' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20'
            ],
            'status' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20'
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
        $this->forge->createTable('ketidakhadiran');
    }

    public function down()
    {
        $this->forge->dropForeignKey('ketidakhadiran', 'ketidakhadiran_id_siswa_foreign');
        $this->forge->dropTable('ketidakhadiran');
    }
}
