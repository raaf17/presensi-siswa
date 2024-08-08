<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_guru' => 'Bu Shinta',
                'nip' => '0089768765532245',
            ],
            [
                'nama_guru' => 'Bu Putri',
                'nip' => '0089768765532246',
            ],
            [
                'nama_guru' => 'Bu Ruly',
                'nip' => '0089768765532247',
            ],
            [
                'nama_guru' => 'Bu Frisca',
                'nip' => '0089768765532248',
            ],
            [
                'nama_guru' => 'Pak Hendro',
                'nip' => '0089768765532249',
            ],
        ];

        $this->db->table('guru')->insertBatch($data);
    }
}
