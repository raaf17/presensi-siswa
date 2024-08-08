<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_siswa' => '1',
                'username' => 'rafi',
                'email' => 'rafi@gmail.com',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'status'    => 'Aktif',
                'role' => 'Admin',
                'foto' => 'foto.jpg'
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
