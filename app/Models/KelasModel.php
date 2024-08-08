<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_jurusan', 'id_guru', 'nama_kelas', 'keterangan', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    function getAll()
    {
        $builder = $this->db->table('kelas');
        $builder->join('jurusan', 'jurusan.id = kelas.id_jurusan');
        $builder->join('guru', 'guru.id = kelas.id_guru');
        $query = $builder->get();
        
        return $query->getResult();
    }
}
