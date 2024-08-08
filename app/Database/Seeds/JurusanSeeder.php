<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jurusan' => 'Teknik Kimia Industri',
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
            ],
            [
                'nama_jurusan' => 'Akuntasi dan Keuangan Lembaga',
            ],
            [
                'nama_jurusan' => 'Animasi',
            ],
        ];

        $this->db->table('jurusan')->insertBatch($data);
    }
}
