<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ArtikelFotoModel;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();

        $this->kategoriModel = new KategoriModel();

        $this->artikelFotoModel = new ArtikelFotoModel();
    }

    public function index($slug)
    {
        $getKategori = $this->kategoriModel->where(['slug' => $slug])->first();

        $data = $this->artikelModel->getArtikelBySlug($getKategori['slug']);

        return view('pages/backend/artikel/index', [
            'getKategori' => $getKategori,
            'data' => $data,
        ]);
    }


    public function create($slug)
    {
        $getKategori = $this->kategoriModel->where(['slug' => $slug])->first();

        return view('pages/backend/artikel/create', [
            'getKategori' => $getKategori
        ]);
    }

    public function store()
    {
        $data = $this->request->getVar([
            'judul',
            'id_kategori',
            'no_regnas',
            'sk_penetapan',
            'provinsi',
            'kabupaten_kota',
            'nama_pemilik',
            'nama_pengelola'
        ]);

        // save artikel
        $this->artikelModel->insert($data);

        $slug = $this->artikelModel->getKategoriSlug($this->request->getVar('id_kategori'));

        // save foto
        $idArtikel = $this->artikelModel->getInsertID();

        if($imagefile = $this->request->getFiles()) {
            foreach($imagefile['foto'] as $foto)
            {
                if ($foto->isValid() && !$foto->hasMoved())
                {
                    $newName = $foto->getRandomName();
                    $this->artikelFotoModel->insert(['id_artikel' => $idArtikel, 'foto' => $newName]);
                    $foto->move('images/artikel',$newName);
                }
            }
        }

        session()->setFlashdata('success', 'Berhasil menambahkan data');

        return redirect()->to('/admin/artikel/' . $slug);
    }

    public function edit($id)
    {
        $data = $this->artikelModel->where(['id' => $id])->first();

        $getKategori = $this->kategoriModel->where(['id' => $data['id_kategori']])->first();

        $getArtikelFoto = $this->artikelModel->getArtikelFoto($data['id']);

        return view('pages/backend/artikel/edit',[
            'data' => $data,
            'getKategori' => $getKategori,
            'getArtikelFoto' => $getArtikelFoto
        ]);
    }

    public function destroy($id)
    {
        $getArtikel = $this->artikelModel->where(['id' => $id])->first();

        $slug = $this->artikelModel->getKategoriSlug($getArtikel['id_kategori']);

        $this->artikelModel->delete($id);

        return redirect()->to('/admin/artikel/' . $slug);
    }
}
