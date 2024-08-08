<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pegawai', 'tanggal_masuk', 'jam_masuk', 'foto_masuk', 'tanggal_keluar', 'jam_keluar', 'foto_keluar', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function rekapHarian()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');

        return $builder->get()->getResultArray();
    }

    public function rekapBulanan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');

        return $builder->get()->getResultArray();
    }

    public function rekapHarianFilter($tanggal_awal, $tanggal_akhir)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->where('tanggal_masuk >=', $tanggal_awal);
        $builder->where('tanggal_masuk <=', $tanggal_akhir);

        return $builder->get()->getResultArray();
    }

    public function rekapBulananFilter($filter_bulan, $filter_tahun)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->where('MONTH(tanggal_masuk', $filter_bulan);
        $builder->where('YEAR(tanggal_masuk', $filter_tahun);

        return $builder->get()->getResultArray();
    }

    public function rekapPresensiPegawai()
    {
        $id_pegawai = session()->get('id_pegawai');
        $db = \Config\Database::connect();

        $builder = $db->table('presensi');
        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->where('id_pegawai', $id_pegawai);

        return $builder->get()->getResultArray();
    }

    public function rekapPresensiPegawaiFilter($tanggal_awal, $tanggal_akhir)
    {
        $id_pegawai = session()->get('id_pegawai');
        $db = \Config\Database::connect();

        $builder = $db->table('presensi');
        $builder->select('presensi.*, pegawai.nama, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.id_lokasi_presensi');
        $builder->where('id_pegawai', $id_pegawai);
        $builder->where('tanggal_masuk >=', $tanggal_awal);
        $builder->where('tanggal_masuk <=', $tanggal_akhir);

        return $builder->get()->getResultArray();
    }
}
