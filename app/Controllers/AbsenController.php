<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Absen;
use CodeIgniter\HTTP\ResponseInterface;

class AbsenController extends BaseController
{
    public function __construct() {
        $this->Absen = new Absen();
    }
    public function CheckAbsen(){
        
    }
    public function AddAbsen(){
        
    }
}
