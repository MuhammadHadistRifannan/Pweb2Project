<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Absen;
use App\Models\Kelas;
use App\Models\QrCode;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;
use PhpParser\JsonDecoder;

class AbsenController extends BaseController
{
    public function __construct()
    {
        $this->Absen = new Absen();
        $this->Qr = new QrCode();
        $this->userModel = new UserModel();
        $this->Kelas = new Kelas();
    }
    public function CheckAbsen()
    {
        $qrdata = $this->request->getJSON(true); // object
        if (!$qrdata || !isset($qrdata['qr'])) {
            return $this->response->setJSON([
                "status" => false,
                "message" => "QR Code tidak ditemukan!"
            ]);
        }

        $dataqr = $qrdata['qr'];

        if (!$qrdata || !isset($dataqr['id'], $dataqr['jadwal'], $dataqr['code'], $dataqr['kelasId'])) {
            return $this->response->setJSON([
                "status" => false,
                "message" => "Format QR Code tidak valid!"
            ]);
        }

        // cek database
        $qr = $this->Qr->find($dataqr['id']);
        $formatJadwal = date('Y-m-d H:i:s', strtotime($dataqr['jadwal']));

        if (!$qr) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Qr tidak ada di database'
            ]);
        }

        if ($dataqr['code'] !== $qr['token']) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Token tidak valid'
            ]);
        }

        if ($dataqr['kelasId'] !== $qr['kelas_id']) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Id Kelas tidak valid'
            ]);
        }

        if ($formatJadwal !== $qr['jadwal']) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Jadwal tidak valid'
            ]);
        }

        // insert absen
        $this->Absen->save([
            'id_user' => user()->id,
            'tanggal_absen' => date('Y-m-d H:i:s'),
            'id_kelas' => $dataqr['kelasId']
        ]); 

        $kelas = $this->Kelas->find($dataqr['kelasId']);

        $this->userModel->update(user()->id , [
            'point' => user()->point + $kelas['point']
        ]);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'success',
            'data' => $dataqr
        ]);

    }
}
