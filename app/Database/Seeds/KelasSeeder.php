<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_jurusan' => '1',
                'id_guru' => '1',
                'nama_kelas' => '12 TKI 1',
                'keterangan' => 'Test Keterangan',
            ],
            [
                'id_jurusan' => '2',
                'id_guru' => '1',
                'nama_kelas' => '12 RPL 2',
                'keterangan' => 'Test Keterangan',
            ],
            [
                'id_jurusan' => '3',
                'id_guru' => '1',
                'nama_kelas' => '12 TKJ 1',
                'keterangan' => 'Test Keterangan',
            ],
            [
                'id_jurusan' => '4',
                'id_guru' => '1',
                'nama_kelas' => '12 AKL 2',
                'keterangan' => 'Test Keterangan',
            ],
            [
                'id_jurusan' => '5',
                'id_guru' => '1',
                'nama_kelas' => '12 Animasi 1',
                'keterangan' => 'Test Keterangan',
            ],
        ];

        $this->db->table('kelas')->insertBatch($data);
    }
}
