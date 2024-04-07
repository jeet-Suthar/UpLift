<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AokModel;

class AokController extends BaseController
{
    public function index()
    {
        //
    }

    public function aok_page()
    {
        $aokModel = new AokModel();

        $data['aok_data'] = $aokModel->get_aok_data();
        // echo "<pre>";
        // print_r($data);
        echo view('components/aok/aokPage', $data);
    }
}
