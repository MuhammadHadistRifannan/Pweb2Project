<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Absen;
use Myth\Auth\Models\UserModel;

class AbsenController extends BaseController
{
    protected $Absen;
    protected $User;

    public function __construct()
    {
        $this->Absen = new Absen();
        $this->User = new UserModel(); // ← PAKAI Myth/Auth UserModel
    }

    // Cek absen
    public function CheckAbsen()
    {
        $json = $this->request->getJSON();
        $userId = $json->user_id ?? null;

        if (!$userId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User ID tidak ditemukan'
            ]);
        }

        $today = date('Y-m-d');

        $cek = $this->Absen->where('user_id', $userId)
            ->where('DATE(created_at)', $today)
            ->first();

        if ($cek) {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'Anda sudah absen hari ini'
            ]);
        }

        return $this->AddAbsen($userId);
    }

    // Tambah absen + poin
    public function AddAbsen($userId)
    {
        // Tambahkan data absensi
        $this->Absen->insert([
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Tambah poin
        $poinTambahan = 10;

        $user = $this->User->find($userId);

        $this->User->update($userId, [
            'points' => $user['points'] + $poinTambahan
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Absen berhasil! Poin ditambahkan.',
            'poin_didapat' => $poinTambahan
        ]);
    }
}
