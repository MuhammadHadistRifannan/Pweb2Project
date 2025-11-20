<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\QrCode;
use CodeIgniter\HTTP\ResponseInterface;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;

class QrController extends BaseController
{
    public function __construct()
    {
        $this->Kelas = new Kelas();
        $this->Qr = new QrCode();
    }

    public function generate()
    {
        $data = $this->request->getPost();
        $kelasId = $data['kelasId'];
        $jadwalId = $data['jadwal'];
        $code = $data['kode'];

        $qr = $this->Qr->insert([
            'kelas_id' => $kelasId,
            'token' => $code,
            'jadwal' => $jadwalId
        ]);

        $dataQR = [
            'id' => $qr,
            'kelasId' => $kelasId,
            'jadwal' => $jadwalId,
            'code' => $code
        ];


        $result = Builder::create()
            ->writer(new PngWriter())
            ->data(json_encode($dataQR))
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->build();

        return $this->response
            ->setHeader('Content-Type', 'image/png')
            ->setBody($result->getString());
    }

    public function getDataKelas($idKelas)
    {
        $kelas = $this->Kelas->find($idKelas);
        return $this->response->setJSON([
            'status' => 'success',
            'tanggal' => $kelas['jadwal']
        ]);
    }

    public function showForm()
    {
        $data['kelas'] = $this->Kelas->findAll();
        return view('auth/qr_form', $data);
    }
}
