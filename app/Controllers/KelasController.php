<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;
use CodeIgniter\HTTP\ResponseInterface;

class KelasController extends BaseController
{
    public function __construct() {
        $this->Kelas = new Kelas();
    }

    public function EnrollKelas(){

    }

}
