<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kelas' => '1',
                'id_lokasi_presensi' => '1',
                'nisn' => '0087688976',
                'nama_siswa' => 'Muhammad Rafi',
                'jenis_kelamin'    => 'Laki-laki',
                'alamat' => 'Serut, Boyolangu, Tulungagung',
                'no_handphone' => '089756432467',
            ],
        ];

        $this->db->table('siswa')->insertBatch($data);
    }
}
