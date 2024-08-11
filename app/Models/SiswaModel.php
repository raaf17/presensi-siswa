<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_kelas', 'id_lokasi_presensi', 'nisn', 'nama_siswa', 'jenis_kelamin', 'alamat', 'no_handphone', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function allSiswa()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, users.username, users.email, users.status, users.role, users.foto, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, kelas.nama_kelas');
        $builder->join('users', 'users.id_siswa = siswa.id');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->join('kelas', 'kelas.id = siswa.id_kelas');

        return $builder->get()->getResultObject();
    }

    public function detailSiswa($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, users.username, users.email, users.status, users.role, users.foto, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, kelas.nama_kelas');
        $builder->join('users', 'users.id_siswa = siswa.id');
        $builder->where('siswa.id', $id);
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->join('kelas', 'kelas.id = siswa.id_kelas');

        return $builder->get()->getRowObject();
    }

    public function editSiswa($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, users.username, users.email, users.password, users.status, users.role, users.foto, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, users.status, users.role, kelas.nama_kelas');
        $builder->join('users', 'users.id_siswa = siswa.id');
        $builder->where('siswa.id', $id);
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->join('kelas', 'kelas.id = siswa.id_kelas');

        return $builder->get()->getRowObject();
    }
}
