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

    public function getArtikelBySlug($slug)
    {
        $this->kategoriModel = new KategoriModel();

        $getKategori = $this->kategoriModel->where(['slug' => $slug])->first();

        if ($slug == true) {
            return $this->where(['id_kategori' => $getKategori['id']])->findAll();
        }
    }

    public function getKategoriSlug($id_kategori)
    {
        $this->kategoriModel = new KategoriModel();

        $slug = $this->kategoriModel->where(['id' => $id_kategori])->first();

        return $slug['slug'];
    }

    public function getArtikelFoto($id_artikel)
    {
        $this->artikelFotoModel = new ArtikelFotoModel();

        $foto = $this->artikelFotoModel->where(['id_artikel' => $id_artikel])->findAll();

        return $foto;
    }
}
