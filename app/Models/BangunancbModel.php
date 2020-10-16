<?php

namespace App\Models;

use CodeIgniter\Model;

class BangunancbModel extends Model
{
    protected $table = 'bangunancb';
    protected $useTimestamps = true;
    protected $allowedFields = ['sk_penetapan', 'kategori_cb', 'kabupaten_kota', 'provinsi', 'nama_pemilik', 'nama_pengelola'];

    public function getBangunancb($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
