<?php

namespace App\Controllers;

use App\Models\BangunancbModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Rules;

class Bangunancb extends BaseController
{
    protected $bangunancbModel;
    public function __construct()
    {
        $this->bangunancbModel = new Bangunancb();
    }
    public function index()
    {
        $data = [
            'title' => 'Cagar Budaya',
            'bangunancb' => $this->bangunancbModel->getBangunancb();
        ];

        return view('bangunancb/index', $data);
    }
}
