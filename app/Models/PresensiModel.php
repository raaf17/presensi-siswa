<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_siswa', 'tanggal_masuk', 'jam_masuk', 'foto_masuk', 'tanggal_keluar', 'jam_keluar', 'foto_keluar', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function rekapHarian()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');

        return $builder->get()->getResultObject();
    }

    public function rekapBulanan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');

        return $builder->get()->getResultObject();
    }

    public function rekapHarianFilter($tanggal_awal, $tanggal_akhir)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->where('tanggal_masuk >=', $tanggal_awal);
        $builder->where('tanggal_masuk <=', $tanggal_akhir);

        return $builder->get()->getResultObject();
    }

    public function rekapBulananFilter($filter_bulan, $filter_tahun)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->where('MONTH(tanggal_masuk', $filter_bulan);
        $builder->where('YEAR(tanggal_masuk', $filter_tahun);

        return $builder->get()->getResultObject();
    }

    public function rekapPresensiSiswa()
    {
        $id_siswa = session()->get('id_siswa');
        $db = \Config\Database::connect();

        $builder = $db->table('presensi');
        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->where('id_siswa', $id_siswa);

        return $builder->get()->getResultObject();
    }

    public function rekapPresensiSiswaFilter($tanggal_awal, $tanggal_akhir)
    {
        $id_siswa = session()->get('id_siswa');
        $db = \Config\Database::connect();

        $builder = $db->table('presensi');
        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');
        $builder->where('id_siswa', $id_siswa);
        $builder->where('tanggal_masuk >=', $tanggal_awal);
        $builder->where('tanggal_masuk <=', $tanggal_akhir);

        return $builder->get()->getResultObject();
    }

    public function riwayatPresensi()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, siswa.nama_siswa, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('siswa', 'siswa.id = presensi.id_siswa');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = siswa.id_lokasi_presensi');

        return $builder->get()->getResultObject();
    }
}
