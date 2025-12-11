<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailKelas;
use App\Models\Kelas;
use CodeIgniter\HTTP\ResponseInterface;

class KelasController extends BaseController
{
    public function __construct()
    {
        $this->Kelas = new Kelas();
        $this->DetailKelas = new DetailKelas();
    }

    public function EnrollKelas($id_kelas)
    {
        $data = $this->request->getVar();
        $newData = [
            'id_kelas' => $id_kelas,
            'id_user' => $data['user_id'],
            'tanggal_masuk' => $data['tanggal_masuk']
        ];

        $newKelas = $this->DetailKelas->insert($newData);

        return redirect()->to('/kelas')->with('success' , 'Jangan Lupa absen yaaa');
    }

}
