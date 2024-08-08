<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiPresensiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lokasi' => 'Kipli Studio',
                'alamat_lokasi' => 'Serut, Boyolangu, Tulungagung',
                'tipe_lokasi' => 'Kantor',
                'latitude'    => '-8.083241080329854',
                'longitude' => '111.9119039537046',
                'radius' => '200',
                'zona_waktu' => 'WIB',
                'jam_masuk' => '08:00',
                'jam_pulang' => '17:00',
            ],
            [
                'nama_lokasi' => 'SMKN 1 Boyolangu',
                'alamat_lokasi' => 'Beji, Boyolangu, Tulungagung',
                'tipe_lokasi' => 'Sekolah',
                'latitude'    => '-8.083241080329854',
                'longitude' => '111.9119039537046',
                'radius' => '200',
                'zona_waktu' => 'WIB',
                'jam_masuk' => '08:00',
                'jam_pulang' => '17:00',
            ],
        ];

        $this->db->table('lokasi_presensi')->insertBatch($data);
    }
}
