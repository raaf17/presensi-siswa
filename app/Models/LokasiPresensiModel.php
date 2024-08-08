<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiPresensiModel extends Model
{
    protected $table            = 'lokasi_presensi';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_lokasi', 'alamat_lokasi', 'tipe_lokasi', 'latitude', 'longitude', 'radius', 'zona_waktu', 'jam_masuk', 'jam_pulang', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;
}
