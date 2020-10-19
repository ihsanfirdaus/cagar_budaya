<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data = $model->getDataKategori();
        
        return view('pages/backend/kategori/index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        if($this->request->getPost('process') == 1){
            
            $model = new KategoriModel();

            $nama = $this->request->getPost('nama');
            $slug = url_title($nama, '-' , TRUE);
  
            $data = [
                'nama' => $nama,
                'slug' => $slug
            ];

            $model->save($data);

            return redirect()->to('/admin/kategori');
        }

        return view('pages/backend/kategori/create');
    }
}
