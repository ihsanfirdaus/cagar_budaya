<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->model = new KategoriModel();
    }

    public function index()
    {
        $data = $this->model->getDataKategori();

        return view('pages/backend/kategori/index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages/backend/kategori/create');
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $slug = url_title($nama, '-', TRUE);

        $data = [
            'nama' => $nama,
            'slug' => $slug
        ];

        $this->model->save($data);

        session()->setFlashdata('success', 'Berhasil menambahkan data');

        return redirect()->to('/admin/kategori');
    }

    public function edit($id)
    {
        $data = $this->model->getDataKategori($id);

        return view('pages/backend/kategori/edit',[
            'data' => $data
        ]);
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama');
        $slug = url_title($nama, '-', TRUE);
        
        $data = [
            'nama' => $nama,
            'slug' => $slug
        ];

        $this->model->update($id,$data);

        session()->setFlashdata('success', 'Berhasil mengubah data');

        return redirect()->to('/admin/kategori');
    }

    public function destroy($id)
    {
        $this->model->delete($id);

        session()->setFlashdata('success', 'Berhasil menghapus data');

        return redirect()->to('/admin/kategori');
    }
}
