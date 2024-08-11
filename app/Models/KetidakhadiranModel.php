<?php

namespace App\Models;

use CodeIgniter\Model;

class KetidakhadiranModel extends Model
{
    protected $table            = 'ketidakhadiran';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_siswa', 'keterangan', 'tanggal', 'deskripsi', 'file', 'status', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;
}
