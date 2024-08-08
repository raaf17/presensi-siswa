<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaTable extends Migration
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
            'id_kelas' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'id_lokasi_presensi' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'nisn' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50'
            ],
            'nama_siswa' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'jenis_kelamin' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10'
            ],
            'alamat' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'no_handphone' => [
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
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id');
        $this->forge->addForeignKey('id_lokasi_presensi', 'lokasi_presensi', 'id');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropForeignKey('siswa', 'siswa_id_kelas_foreign');
        $this->forge->dropForeignKey('siswa', 'siswa_id_lokasi_presensi_foreign');
        $this->forge->dropTable('siswa');
    }
}
