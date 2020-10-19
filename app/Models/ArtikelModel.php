<?php 
namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'judul',
        'no_regnas',
        'sk_penetapan',
        'peringkat',
        'id_kategori',
        'kabupaten_kota',
        'provinsi',
        'nama_pemilik',
        'nama_pengelola'
    ];

    public function getArtikelBySlug($slug = true)
    {
        $kategoriModel = new KategoriModel();
        
        $getKategori = $kategoriModel->where(['slug' => $slug])->first();

        if ($slug == true)
        {
            return $this->where(['id_kategori' => $getKategori['id']])->findAll();
        }

    }
}
