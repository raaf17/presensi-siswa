<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePresensiTable extends Migration
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
            'tanggal_masuk' => [
                'type'              => 'DATE',
            ],
            'jam_masuk' => [
                'type'              => 'TIME',
            ],
            'foto_masuk' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'tanggal_keluar' => [
                'type'              => 'DATE',
            ],
            'foto_keluar' => [
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
        $this->forge->createTable('presensi');
    }

    public function down()
    {
        $this->forge->dropForeignKey('presensi', 'presensi_id_siswa_foreign');
        $this->forge->dropTable('presensi');
    }
}
