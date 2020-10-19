<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index($slug)
    {
        // ArtikelModel
        $artikelModel = new ArtikelModel();
        // KategoriModel
        $kategoriModel = new KategoriModel();

        $getKategori = $kategoriModel->where(['slug' => $slug])->first();
   
        $data = $artikelModel->getArtikelBySlug($getKategori['slug']);
        
        return view('pages/backend/artikel/index',[
            'getKategori' => $getKategori,
            'data' => $data
        ]);
    }

    public function create($slug)
    {
        $kategoriModel = new KategoriModel();

        $getKategori = $kategoriModel->where(['slug' => $slug])->first();

        return view('pages/backend/artikel/create',[
            'getKategori' => $getKategori
        ]);
    }

    public function store()
    {
        $model = new ArtikelModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'no_regnas' => $this->request->getPost('no_regnas'),
            'sk_penetapan' => $this->request->getPost('sk_penetapan'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kabupaten_kota' => $this->request->getPost('kabupaten_kota'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'nama_pengelola' => $this->request->getPost('nama_pengelola')
        ];

        $model->save($data);
        
        $kategoriModel = new KategoriModel();

        $getKategori = $kategoriModel->where(['id' => $this->request->getPost('id_kategori')])->first();

        return redirect()->to('/admin/artikel/'.$getKategori['nama']);
    }
}
