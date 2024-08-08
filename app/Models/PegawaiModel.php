<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_lokasi_presensi', 'id_jabatan', 'nip', 'nama', 'jenis_kelamin', 'alamat', 'no_handphone', 'foto', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function allPegawai()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->select('pegawai.*, users.username, users.status, users.role, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, jabatan.nama_jabatan');
        $builder->join('users', 'users.id_pegawai = pegawai.id');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan');

        return $builder->get()->getResultObject();
    }

    public function detailPegawai($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->select('pegawai.*, users.username, users.status, users.role, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, jabatan.nama_jabatan');
        $builder->join('users', 'users.id_pegawai = pegawai.id');
        $builder->where('pegawai.id', $id);
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan');

        return $builder->get()->getRowObject();
    }

    public function editPegawai($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->select('pegawai.*, users.username, users.password, users.status, users.role, lokasi_presensi.alamat_lokasi, lokasi_presensi.nama_lokasi, users.status, users.role, jabatan.nama_jabatan');
        $builder->join('users', 'users.id_pegawai = pegawai.id');
        $builder->where('pegawai.id', $id);
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan');

        return $builder->get()->getRowObject();
    }
}
